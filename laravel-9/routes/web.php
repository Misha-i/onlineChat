<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\UsersController;
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

// Route::redirect('/', 'users');
// Route::resource('users', UsersController::class);
/*Route::get('cars1', function() {
    return view('cars');
});*/

Route::redirect('/', 'cars');
Route::resource('cars', CarsController::class);
/*Route::get('/create', 'App\Http\Controllers\CarsController@create');
Route::get('/index', 'App\Http\Controllers\CarsController@index');
Route::post('/CreateCar', 'App\Http\Controllers\CarsController@create');*/





