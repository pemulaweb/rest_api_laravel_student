<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PeringkatController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\KantinController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\CartController;
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
Route::get('getprofile', [StudentController::class, 'getUser']);
Route::post('/register', [StudentController::class, 'register']);
Route::get('/getprofile/{id}', [StudentController::class, 'getprofile']);
Route::put('profiledit', [StudentController::class, 'profiledit']);
Route::delete('profiledelete', [StudentController::class, 'profiledelete']);
/* ini untuk data nilai */
Route::post('/nilai', [StudentController::class, 'addnilai']);

Route::post('/uploadImage', [PeringkatController::class, 'uploadImage']);

//restapi penilaians
Route::post('penilaian', [PenilaianController::class, 'penilaian']);
Route::get('penilaianget', [PenilaianController::class, 'getPenilaian']);
Route::get('getPenilaianId/{id}', [PenilaianController::class, 'getPenilaianId']);

//kantins
Route::post('kantins', [KantinController::class, 'addKantin']);
Route::post('food', [KantinController::class, 'FoodKantin']);
Route::get('kantinJoin', [KantinController::class, 'kantinJoin']);

//carts
Route::post('foodaddtocart', [CartController::class, 'store']);


Route::get('food', [KantinController::class, 'getfood']);

Route::put('addToCartFood', [CartController::class, 'addToCart']);
// Route::put('addToCart/{id}', [KantinController::class, 'addToCart']);

//kelas
Route::get('kelas', [StudentController::class, 'getKelas']);
Route::get('getfood', [KantinController::class, 'getKantin']);
Route::post('/addkelas', [StudentController::class, 'inputKelas']);


//nilai
Route::post('/peringkatadd', [PeringkatController::class, 'add']);
Route::get('/peringkatStudent', [StudentController::class, 'peringkatStudent']);

//mailgunR\Providers
Route::get('sendemail', [SendMailController::class, 'sendmailutang']);