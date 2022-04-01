<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ArithmeticController;

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

Route::get('/get-all-operators', [ArithmeticController::class, 'get_all_operators'])->name('get_all_operators');
Route::post('/check-arithmetic-operation', [ArithmeticController::class, 'check_arithmetic_operations'])->name('check_arithmetic_operations');
