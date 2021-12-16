<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\admincontroller;
use App\Http\Controllers\frontend\frontendcontroller;
use App\Http\Controllers\login\logincontroller;
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
//login
Route::get('register',[logincontroller::class,'register'])->name('register');
Route::post('sendregistertodb',[logincontroller::class,'sendregistertodb'])->name('sendregistertodb');
Route::get('login',[logincontroller::class,'login'])->name('login');
Route::post('addlogin',[logincontroller::class,'addlogin'])->name('addlogin');
Route::get('logout',[logincontroller::class,'logout'])->name('logout');

//frontend controller 

Route::get('/',[frontendcontroller::class,'index']);
Route::get('frontendviews/details/{id}',[frontendcontroller::class,'details'])->name('details');
Route::get('frontendviews/viewcategory/{id}',[frontendcontroller::class,'viewcategory'])->name('viewcategory');
Route::post('addprotocart',[frontendcontroller::class,'addprotocart'])->name('addprotocart');
Route::get('cartpage',[frontendcontroller::class,'cartpage'])->name('cartpage');
Route::get('removecart/{id}',[frontendcontroller::class,'removecart'])->name('removecart');
Route::get('frontendviews/searchitem',[frontendcontroller::class,'searchitem'])->name('searchitem');

//admin routes

Route::get('admins/index',[admincontroller::class,'index']);
Route::get('admins/addcategory',[admincontroller::class,'addcategory']);
Route::post('admins/addcartodb',[admincontroller::class,'addcartodb']);
Route::get('admins/addproduct',[admincontroller::class,'addproduct']);
Route::post('admins/addprotodb',[admincontroller::class,'addprotodb']);
Route::get('admins/viewcart',[admincontroller::class,'viewcart']);
Route::get('admins/updatecartpage/{id}',[admincontroller::class,'updatecartpage']);
Route::put('admins/editcartodb/{id}',[admincontroller::class,'editcartodb'])->name('editcartodb');
Route::get('admins/viewpro',[admincontroller::class,'viewpro']);
Route::get('admins/updatepropage/{id}',[admincontroller::class,'updatepropage']);
Route::put('admins/updateprotodb/{id}',[admincontroller::class,'updateprotodb'])->name('updateprotodb');