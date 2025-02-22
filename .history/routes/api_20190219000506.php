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

Route::group(['prefix' => '/test/v1', 'namespace' => 'API\V1', 'as' => 'api.'], function () {
    Route::get('customerCategory/getAllCategories', 'CustomerCategoriesController@getAllCategories'); 
    Route::get('contacts/getAllContactsByCustomerID/{id}', 'ContactsController@getAllContactsByCustomerID');   
    Route::get('contacts/getAllTasksByCustomerID/{id}', 'TasksController@getAllTasksByCustomerID');
    Route::get('files/getAllFilesByCustomerID/{id}', 'FileUploadsController@getAllFilesByCustomerID'); 
    Route::get('pipelines/getPipelinesByCustomerID/{id}', 'PipelinesController@getPipelinesByCustomerID');

    Route::post('files/uploadFile/', 'FileUploadsController@uploadFile');      
     
    Route::resource('customerCategory', 'CustomerCategoriesController', ['except' => ['create', 'edit']]);
    Route::resource('customer', 'CustomersController', ['except' => ['create', 'edit']]);
    Route::resource('contacts', 'ContactsController', ['except' => ['create', 'edit']]);
    Route::resource('tasks', 'TasksController', ['except' => ['create', 'edit']]);
    Route::resource('files', 'FileUploadsController', ['except' => ['create', 'edit']]);
    Route::resource('pipelines', 'PipelinesController', ['except' => ['create', 'edit']]);
});
