<?php

use App\Http\Controllers\Two_learnController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/news', function () {
//    return view('welcome');
//});

Route::get('/hello/{name}', static function (string $name) {
    return "Hello $name";
});

Route::get('/', [Two_learnController::class, 'index']);

//Exception
Route::get('/testexception', [Two_learnController::class, 'testException'])
    ->name('categories.testexception');
