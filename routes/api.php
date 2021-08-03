<?php

use App\Http\Controllers\promotionController;
use App\Http\Controllers\usercontroller;
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



Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
   
   
    Route::post("add",[promotionController::class,'add']);
    Route::put("update",[promotionController::class,'update']);
    Route::get("search",[promotionController::class,'search']);
    Route::delete("delete/{id}",[promotionController::class,'delete']);
  Route::get("show/{id?}",[promotionController::class,'list']);
    Route::get("user",fn()=>'msggggggggggggg');
    });
    Route::post("login",[usercontroller::class,'index']);
    Route::post('register', [usercontroller::class, 'register']);
    
   //Route::get("show",fn()=>'msggggggggggggg');