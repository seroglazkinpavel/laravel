<?php

use App\Http\Controllers\Laravel_learn;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [Laravel_learn::class, 'query_builder_all']);
Route::get('/select/{id}', [Laravel_learn::class, 'query_builder_first']);
Route::get('/insert', [Laravel_learn::class, 'query_builder_insert']);
Route::get('/update/{id}', [Laravel_learn::class, 'query_builder_update']);
Route::get('/delete/{id}', [Laravel_learn::class, 'query_builder_delete']);


Route::get('/{id}', [Laravel_learn::class, 'test'])
    ->where('id', '\d+');

