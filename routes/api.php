<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\lazadaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

/*----API-------- */
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/get-product/{id}', [ApiController::class, 'getOneProduct']);
// Route::get('/get-product', [ApiController::class, 'getProducts']);
// Route::get('/delete-product/{id}', [ApiController::class, 'deleteProduct']);
// Route::get('/edit-product/{id}', [ApiController::class, 'editProduct']);
// Route::post('/upload-image', [ApiController::class, 'uploadImage']);



/*-----middterm----*/

Route::get('/get-lazada', [lazadaController::class, 'getProducts']);
Route::get('/get-product/{id}', [lazadaController::class, 'getOneProduct']);
Route::post('/add-product', [lazadaController::class, 'addProduct']);
Route::post('/upload-image', [lazadaController::class, 'uploadImage']);