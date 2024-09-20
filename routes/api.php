<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




//Auth
Route::post('login', [AuthController::class, 'login']);

Route::post('user-reg', [AuthController::class, 'store']);


Route::get('user/{id}', [AuthController::class, 'userProfile']);

Route::get('user-delete/{id}', [AuthController::class, 'delete']);



 //Task

 Route::get('tasks', [TaskController::class, 'pagination']);

 Route::get('tasks/{id}', [TaskController::class, 'view']);


 Route::post('tasks/search', [TaskController::class, 'filterTasks']);


//This routes for Auth Users
 Route::middleware(['auth:api'])->group(function () {

    Route::post('tasks', [TaskController::class, 'save']);

    Route::put('tasks/{id}', [TaskController::class, 'edit']);

    Route::delete('tasks/{id}', [TaskController::class, 'deleteByID']);

    Route::get('my-notifications', [NotificationController::class, 'myNotifications']);


 });



 //images

 Route::get('images', [ImageController::class, 'list']);
 Route::post('image-create', [ImageController::class, 'save']);
 Route::post('image/edit/{id}', [ImageController::class, 'edit']);


 //Notifications
 Route::get('notifications', [NotificationController::class, 'list']);

