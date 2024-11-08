<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiController;

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

Route::get('/Apiproductos', [apiController::class, 'index']);

Route::get('/Apiproductos/{id}', [apiController::class, 'show']);

Route::post('/Apiproductos',[apiController::class,'store']);

Route::put('/Apiproductos/{id}',[apiController::class,'update']);

Route::delete('/Apiproductos/{id}',[apiController::class,'destroy']);
