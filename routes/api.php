<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ AdminRegistrationController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Tutors\AddCourseController;
use App\Http\Controllers\Tutors\CourseListController; 
// use 
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

// Route::get('/', function(){
//     return 5;
// });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    
], function () {
    Route::post('register', [RegisterController::class, 'create']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('verify', [RegisterController::class, 'verifyemail']);
    
    // admin routes
    Route::post('create', [CourseListController::class,'crearteListOfCourse']);
    Route::get('getcourses', [CourseListController::class,'getcourseList']);
    
    Route::post('adminreg', [AdminRegistrationController::class, 'registerAdmin']);
    Route::post('adminlogin', [AdminLoginController::class, 'adminLogin']);
    Route::post('createcourse', [AddCourseController::class, 'addCourse']);
    // getCourses
    Route::get('fetchcourses', [AddCourseController::class, 'getCourses']);
    // ........
    
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
    Route::post('payload', 'App\Http\Controllers\AuthController@payload');

});


// Route::group([

//     'middleware' => 'api',
    

// ], function () {

//     Route::post('login', 'AuthController@login');
//     Route::post('logout', 'AuthController@logout');
//     Route::post('refresh', 'AuthController@refresh');
//     Route::post('me', 'AuthController@me');

// });
