<?php


use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;





Route::group(['prefix'=>'admin','as'=>'admin.'],function (){
    Route::get('/login',[AdminLoginController::class, 'getLogin'])->name('login-page');
    Route::post('/send-login',[AdminLoginController::class, 'postLogin'])->name('login');



    Route::middleware(['auth:web'])->group(function () {

        Route::get('/dashboard/{period?}',[DashboardController::class, 'index'])->name('dashboard');

        Route::post('/logout',[AdminLoginController::class, 'logout'])->name('logout');

        Route::resource('users', UserController::class);


        Route::resource( 'tasks', TaskController::class);
    });



        // 404 not found
        Route::get('/{any}', function($any){
            return abort('405');
        })->where('any', '.*');

});
