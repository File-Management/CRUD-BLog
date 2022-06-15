<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\AuthController;



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



//Public
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//Protected
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/blog/get_data', [BlogController::class, 'getData']);
    Route::get('/blog/{id}/show', [BlogController::class, 'show']);
    Route::post('/blog/create', [BlogController::class, 'create']);
    Route::delete('/blog/{id}/delete', [BlogController::class, 'delete']);
    Route::post('/logout', [AuthController::class, 'logout']);
    return auth()->user();
});
    
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});