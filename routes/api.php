<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', 'AuthController@logout');
    });
});

Route::group(['prefix' => 'user'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('edit-category', function () {
            return response()->json([
                'message' => 'Admin Access!',
                'status_code' => 200
            ], 200);
        })->middleware('scope:do_anything');
        //
        Route::post('create-category', function () {
            return response()->json([
                'message' => 'Everyone Access!',
                'status_code' => 200
            ], 200);
        })->middleware('scope:do_anything,can_create');
    });
});
Route::resource('categories', 'CategoryController');
