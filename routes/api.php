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

Route::get('/test', function () {
    $status = "Live";
    return response()->json(compact('status'));
});

Route::group([
    'prefix' => '/admin',
], function(){
    Route::post('/login', "AuthController@login")->name('admin.login');
    Route::get('/logout', "AuthController@logout")->middleware('auth:sanctum')->name('admin.logout');
});
