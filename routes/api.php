<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1')->group(function () {
    Route::post('to-do-list/{listId}/to-do-items', 'ToDoListController@storeToDoListItem')->where('search', '.*');
    Route::put('to-do-list/{listId}/to-do-items/{listItemId}','ToDoListController@updateToDoListItem');
    Route::delete('to-do-list/{listId}/to-do-items/{listItemId}', 'ToDoListController@destroyListItem');

    Route::apiResource('to-do-list', 'ToDoListController');
});

