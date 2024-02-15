<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\regisController;
use App\Http\Controllers\bookController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\commentContrller;
use App\Http\Controllers\fullCategoryController;
use App\Http\Controllers\favoriteController;
use App\Http\Controllers\commentController;

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

Route::get('/', function () {
    return view('dashboard');
})->name('main');

Route::get('home', function(){
    return redirect()->route('main');
});

Route::group(['middleware' => 'guest'], function() {
    Route::get('login', [loginController::class, 'authLogin'])->name('auth.login');
    Route::post('login', [loginController::class,'login'])->name('login');
    Route::get('register', [regisController::class, 'authRegis'])->name('auth.regis');
    Route::post('register', [regisController::class, 'regis'])->name('regis');
    Route::get('auth/register/accept-account/{id}', [regisController::class, 'acceptAccount'])->name('accept.account');
});

Route::group(['middleware' => 'auth'], function() {
    Route::post('auth/logout', [loginController::class, 'logout'])->name('logout');
});

Route::get('category', [categoryController::class, 'index']);
Route::get('category/{id}', [categoryController::class, 'show']);
Route::post('category', [categoryController::class, 'store']);
Route::put('category/{id}', [categoryController::class, 'update']);
Route::delete('category/{id}', [categoryController::class, 'delete']);

Route::get('book', [bookController::class, 'index']);
Route::get('book/{id}', [bookController::class, 'show']);
Route::post('book', [bookController::class, 'store']);
Route::put('book/{id}', [bookController::class, 'update']);
Route::delete('book/{id}', [bookController::class, 'delete']);

Route::get('favorite', [favoriteController::class, 'index']);
Route::post('favorite', [favoriteController::class, 'store']);
Route::delete('favorite/{id}', [favoriteController::class, 'delete']);

Route::get('fullCategory', [fullCategoryController::class, 'index']);
Route::get('fullCategory/{id}', [fullCategoryController::class, 'show']);
Route::post('fullCategory', [fullCategoryController::class, 'store']);
Route::put('fullCategory/{id}', [fullCategoryController::class, 'update']);
Route::delete('fullCategory/{id}', [fullCategoryController::class, 'delete']);

Route::get('comment', [commentContrller::class, 'index']);
Route::get('comment/{id}', [commentContrller::class, 'show']);
Route::post('comment', [commentContrller::class, 'store']);
Route::put('comment/{id}', [commentContrller::class, 'update']);
Route::delete('comment/{id}', [commentContrller::class, 'delete']);