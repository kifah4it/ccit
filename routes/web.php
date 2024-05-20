<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SignupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Route::post('users',function(Request $request){
   return $request; 
});

Route::controller(HomeController::class)->group(function(){
    Route::get('/','index');
   Route::get('/switchlang/{id}','switchlang');
    Route::get('/courses/{cat}','courses');
    Route::get('/courses','courses');
    Route::get('/course/{name}','course');
    Route::get('/curriculum/{name}','curriculum');
    Route::get('/login','login');
});


Route::get('Languages',function(){
    return View('Languages');
});

// Route::get('/dashboard','DashboardController@index');
//  Route::post('/Login',"AuthController@Login");
// Route::get('/','AuthController@show');

Route::controller(AuthController::class)->group(function(){
    Route::post('/Login','Login');
    Route::get('/Logout','Logout');
});

Route::controller(CourseController::class)->group(function(){
    Route::post('/enroll','enroll');
});


Route::controller(DashboardController::class)->group(function(){
    Route::get('/dashboard','index');
});

// Route::controller(SignupController::class)->group(function(){
//     Route::get('/signup','index');
//     Route::post('/signup','store');
// });



// Route::resource('courses', CourseController::class);

//Route::get('/switchlang/{id}', [HomeController::class, 'switchlang']);

Route::resource('signup',SignupController::class);
Route::post('/checkenrolmentavailability',[SignupController::class,'checkenrolmentavailability'])->name('checkenrolmentavailability');
// Route::controller(SignupController::class)->group(function(){
//     Route::post('/signup','SignupController@store')->name('signup.store');
//     Route::post('/checkenrolmentavailability','SignupController@checkenrolmentavailability')->name('signup.checkenrolmentavailability');
// });
