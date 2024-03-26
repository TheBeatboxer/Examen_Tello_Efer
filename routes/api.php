<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
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

Route::get('libros', [LibroController::class, 'index']);
Route::get('libros/{libroID}', [LibroController::class, 'has_one']);
Route::post('libros', [LibroController::class, 'store']);
Route::patch('libros/{libroID}', [LibroController::class, 'update']);
Route::delete('libros/{libroID}', [LibroController::class, 'destroy']);

