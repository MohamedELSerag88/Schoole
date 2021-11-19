<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'AuthController@login');


Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth:api'
], function () {
    Route::apiResource('students', StudentsController::class);

    Route::get('send-email', [AuthController::class, 'sendEmail']);
});
