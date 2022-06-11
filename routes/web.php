<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BlogController;

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

Route::get('backend/login','SSOBrokerController@authenticateToSSO');
Route::get('backend/login','SSOBrokerController@authenticateToSSO');
Route::get('authenticateToSSO','SSOBrokerController@authenticateToSSO');
Route::get('authData/{authData}','SSOBrokerController@authenticateToSSO');
Route::get('logout/{sessionId}','SSOBrokerController@logout');
Route::get('changeRole/{role}', 'SSOBrokerController@changeRole')->name('changeRole');

Route::group(['middleware' => ['SSOBrokerMiddleware']], function () {
    Route::get('test', function(){
       return 'test';
    });
 });
 

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/home',BlogController::class);
Route::resource('/blog',BlogController::class);
