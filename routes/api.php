<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TestApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 Route::get('/blog',[TestApiController::class, 'index']);
 Route::post('/blog/insert',[TestApiController::class, 'insert']);
 Route::get('/blog/{id}',[TestApiController::class, 'edit']);
 Route::post('/blog/{id}/update',[TestApiController::class, 'update']);
  Route::delete('/blog/{id}/delete',[TestApiController::class, 'destroy']);

