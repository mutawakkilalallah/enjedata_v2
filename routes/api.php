<?php

use App\Http\Controllers\APIPersonController;
use App\Http\Controllers\KosmaraController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/notification', [KosmaraController::class, 'notification']);

Route::get('/person', [APIPersonController::class, 'getAll']);
Route::get('/person/{uuid}', [APIPersonController::class, 'getDetail']);
