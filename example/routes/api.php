<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Laravel_learn;

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

#Route::post('/getBook', [Laravel_learn::class, 'query_api']);
Route::get('/getBook', [Laravel_learn::class, 'getBook']);
Route::post('/insertBook', [Laravel_learn::class, 'insertBook']);
Route::post('/update', [Laravel_learn::class, 'updateBook']);
Route::post('/delete', [Laravel_learn::class, 'deleteBook']);
