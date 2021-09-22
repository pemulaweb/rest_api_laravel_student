<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PeringkatController;
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

Route::get('/contoh', function () {
    return response()->json('success');
});
/* ini untuk data student */
Route::post('/register', [ProfileController::class, 'register']);
Route::get('/getprofile/{id}', [ProfileController::class, 'getprofile']);
Route::put('profiledit', [ProfileController::class, 'profiledit']);
Route::delete('profiledelete', [ProfileController::class, 'profiledelete']);
/* ini untuk data nilai */
Route::post('/nilai', [PeringkatController::class, 'add']);