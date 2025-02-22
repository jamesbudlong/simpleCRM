<?php

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

Auth::routes();

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', 'UsersController@index');

Route::group(['middleware' => 'auth'], function() {
    //Route::get('/home', 'DashboardController@index');
    Route::get('/{any}', function () {
        return view('home');    
    })->middleware('auth')->where('any', '.*');
});

Route::get('alert/{AlertType}','sweetalertController@alert')->name('alert');

//Route::post('/register', 'UsersController@create');

// Route::get('/', function () {
//     return view('home');
// })->middleware('auth');

// Route::get('/{any}', function () {
//     return view('home');
// })->middleware('auth')->where('any', '.*');

//Route::get('/home', 'HomeController@index')->name('home');
