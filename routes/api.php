<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
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
Route::get('/products', [ProductController::class,'index']);

Route::get('/products/{id}', [ProductController::class, 'show']);


Route::get('/products/search/{name}', [ProductController::class, 'search']);




//santum

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/products', [ProductController::class, 'store']);

    Route::put('/products/{id}', [ProductController::class, 'update']);

    Route::delete('/products/{id}', [ProductController::class, 'destroy']);

    Route::post('/logoff', [AuthController::class, 'logout']);

});

//Register
//1|fHXSZFXXHrGJ0mgQcgkaA2WWLqlfl9BWoOMssNI3

Route::post('/signup', [AuthController::class, 'register']);
Route::post('/signin', [AuthController::class, 'login']);





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
