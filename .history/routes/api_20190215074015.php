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

Route::get('files/{path_file}/{file}', function($path_file = null, $file = null) {
    $path = storage_path().'/files/uploads/'.$path_file.'/'.$file;
    if(file_exists($path)) {
        return Response::download($path);
    }
});

Route::group(['prefix' => '/v1', 'namespace' => 'API\V1', 'as' => 'api.'], function () {
    Route::get('customerCategory/getAllCategories', 'CustomerCategoriesController@getAllCategories'); 
    Route::get('contacts/getAllContactsByCustomerID/{id}', 'ContactsController@getAllContactsByCustomerID');   
    Route::get('contacts/getAllTasksByCustomerID/{id}', 'TasksController@getAllTasksByCustomerID');
    Route::get('files/getAllFilesByCustomerID/{id}', 'FileUploadsController@getAllFilesByCustomerID');  
    Route::post('files/uploadFile/', 'FileUploadsController@uploadFile');       
    Route::resource('customerCategory', 'CustomerCategoriesController', ['except' => ['create', 'edit']]);
    Route::resource('customer', 'CustomersController', ['except' => ['create', 'edit']]);
    Route::resource('contacts', 'ContactsController', ['except' => ['create', 'edit']]);
    Route::resource('tasks', 'TasksController', ['except' => ['create', 'edit']]);
});
