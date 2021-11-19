<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Transformers\UserResource;
use App\Http\Requests\LoginRequest;
use App\Models\Schoole;
use App\Jobs\SendEmail;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        try {
            $item = [];
            $credentials = $request->only(['email', 'password']);
            $item = User::where('email', $request->email)->first();
            if (!$item['access_token'] = Auth::guard('api')->attempt($credentials, true)) {
                throw new \Exception('Something went wrong!', 400);
                $item = [];
            } else {
                $item = new UserResource($item);
            }
            return $this->respondWithSuccess($item);
        } catch (\Exception $e) {
            return $this->respondUnAuthenticated($e->getMessage());
        }
    }

    public function sendEmail()
    {
        try {
            $admins = User::where('role', 'Admin')->get();
            $schooles = Schoole::withCount('students')->get();
            foreach ($admins as $key => $admin) {
                $email_data = [
                    'template_path' => 'emails.admin.student-count',
                    'subject' => 'Student Count',
                    'schooles' => $schooles,
                    'receiver_email' => $admin->email
                ];
                SendEmail::dispatch($email_data);
            }

            return $this->respondOk('Email send successfully');
        } catch (\Exception $e) {
            return $this->respondUnAuthenticated($e->getMessage());
        }
    }
}
