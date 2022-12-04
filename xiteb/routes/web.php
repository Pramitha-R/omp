<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\amountController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\loginController;
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

Route::get('/',[loginController::class,'index']);
Route::post('/checklogin',[loginController::class,'checklogin']);

Route::get('/Admindash',[adminController::class,'index']);
Route::get('/logout',[adminController::class,'logout']);

Route::get('/registration',[customerController::class,'register']);
Route::post('/storeNewCustomer',[customerController::class,'storeNewCustomer']);
Route::get('/custDash',[customerController::class,'index']);
Route::get('/prescriptionPage/{customer}',[customerController::class,'prescriptionPage']);
Route::post('/storeprescription',[customerController::class,'storeprescription']);

Route::get('/customerprescription',[adminController::class,'customerprescription']);
Route::get('/viewprescription/{customer}',[adminController::class,'viewprescription']);

Route::get('/addprice/{prescription}',[adminController::class,'addprice']);
Route::post('/getTotalAmount',[amountController::class,'getTotalAmount']);

Route::get('/showprice/{customer}',[customerController::class,'showprice']);
Route::post('/cansalOrder/{customer}',[customerController::class,'cansalOrder']);
Route::post('/cansalOrderByAdmin/{customer}',[customerController::class,'cansalOrderByAdmin']);