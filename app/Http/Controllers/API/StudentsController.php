<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Http\Helpers\Traits\ApiPaginator;
use App\Http\Requests\StudentRequest;
use App\Transformers\StudentResource;

class StudentsController extends Controller
{
    use ApiPaginator;

    public function index(Request $request): JsonResponse
    {
        try {
            $students = Student::paginate(10);
            $collection = StudentResource::collection($students);
            $data = $this->getPaginatedResponse($students, $collection);
            return $this->respondWithSuccess($data);
        } catch (\Exception $e) {
            return $this->respondError($e->getMessage());
        }
    }

    public function store(StudentRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $model = Student::create($request->validated());
            DB::commit();
            return $this->respondCreated([$model->id]);
        } catch (\Exception $e) {
            return $this->respondError($e->getMessage());
        }
    }

    public function show($id): JsonResponse
    {
        try {
            $item = Student::find($id);
            if ($item) {
                $item = new StudentResource($item);
                return $this->respondWithSuccess($item);
            } else {
                return $this->respondError('Student Not Found !');
            }
        } catch (\Exception $e) {
            return $this->respondError($e->getMessage());
        }
    }

    public function update(StudentRequest $request, $id): JsonResponse
    {
        try {
            DB::beginTransaction();
            $item = Student::find($id);
            if ($item) {
                $item->update($request->all());
                $item = new StudentResource($item);
                DB::commit();
                return $this->respondOk('Student updated successfully .');
            } else {
                return $this->respondError('Student Not Found !');
            }
        } catch (\Exception $e) {
            return $this->respondError($e->getMessage());
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $item = Student::find($id);
            if ($item) {
                $item->delete();
                return $this->respondOk('Student Deleted Successfully .');
            } else {
                return $this->respondError('Student Not Found !');
            }
        } catch (\Exception $e) {
            return $this->respondError($e->getMessage());
        }
    }
}
