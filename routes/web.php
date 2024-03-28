<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/luky', function () {
    return view('selamatDTG');
});

Route::get('/lukyy', function () {
    return view('index');
});

Route::get('/profile',[userController::class, 'index'])->name ('UserIndex'); 

Route::get('/tambahuser',[userController::class,'tambah']);
Route::post('/kirimuser',[userController::Class,'add']);
Route::get('/profile/detail/{id}',[userController::class,'detail']);
Route::get('/profile/edit/{id}',[userController::class,'detailedit']);
Route::post('/editprofile/{id}',[userController::class,'edit']);
// Route::get('/profile/delete/{id}',[userController::class,'delete']);
Route::delete('/profile/delete/{id}',[userController::class,'delete']);


