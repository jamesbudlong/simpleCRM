<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('user/getAllUsers', 'UsersController@getAllUsers');

Route::group(['prefix' => '/v1', 'namespace' => 'API\V1', 'as' => 'api.'], function () {
    Route::get('customerCategory/getAllCategories', 'CustomerCategoriesController@getAllCategories');    
    Route::resource('customerCategory', 'CustomerCategoriesController', ['except' => ['create', 'edit']]);
    Route::resource('person', 'PersonsController', ['except' => ['create', 'edit']]);
});
