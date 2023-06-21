<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\demoController;
use App\Http\Controllers\formController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\sumController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

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

// Route::get('/demo', [sumController::class, 'index']);

//thực hiện đường dẫn để chạy controller

// Route::get('/Form',[formController::class, 'index']);
// Route::post('/Form', [formController::class, 'displayInfo']);


Route :: get('/', function(){
    return redirect('/master');
});
Route :: get('/master', [PageController:: class, 'getIndex']);
Route:: get('/type/{id}', [PageController:: class, 'typeProduct']);




//-----------------------Login - register------------------
Route::get('/register', function () {
    return view('page.register');
});

Route::post('/register', [UserController::class, 'Register']);


Route::get('/login', function () {
    return view('page.login');
});
Route::post('/login', [UserController::class, 'Login']);

Route::get('/logout', [UserController::class, 'Logout']);

//----------------------------------Cart-----------------------

Route::get('add-to-cart/{id}', [PageController::class, 'getAddToCart'])->name('themgiohang');
Route::get('del-cart/{id}', [PageController::class, 'getDelItemCart'])->name('xoagiohang');
