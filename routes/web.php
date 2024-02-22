<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\regisController;
use App\Http\Controllers\bookController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\officerController;

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
    // return view('Mails.accept-account');
    return view('form.dashboard');
})->name('main')->middleware('email_verified');

Route::get('home', function(){
    return redirect()->route('main');
});

Route::get('auth/register/accept-account/{id}', [regisController::class, 'acceptAccount'])->name('accept.account');

Route::group(['middleware' => 'guest'], function() {
    Route::get('login', [loginController::class, 'authLogin'])->name('auth.login');
    Route::post('login', [loginController::class,'login'])->name('login');
    Route::get('register', [regisController::class, 'authRegis'])->name('auth.regis');
    Route::post('register', [regisController::class, 'regis'])->name('regis');
});

Route::group(['middleware' => 'auth'], function() {
    Route::post('auth/logout', [loginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['role:admin', 'email_verified']], function() {
    Route::get('officer', [officerController::class, 'index'])->name('officer');
    Route::get('officer/create', function() {
        return view('form.officer.create');
    })->name('officer.create');
    Route::post('officer', [officerController::class, 'store'])->name('officer.store');
    Route::put('officer/reset-password', [officerController::class, 'reset'])->name('officer.reset');
    Route::put('officer/ban/{id}', [officerController::class, 'ban'])->name('officer.ban');
    Route::put('officer/unban/{id}', [officerController::class, 'unban'])->name('officer.unban');
    Route::delete('officer/delete/{id}', [officerController::class. 'delete'])->name('officer.delete');
});

Route::group(['middleware' => ['role:admin,officer', 'email_verified']], function() {
    Route::get('category', [categoryController::class, 'index'])->name('category');
    Route::post('category', [categoryController::class, 'store'])->name('category.create');
    Route::get('category/trash', [categoryController::class, 'trash'])->name('category.trash');
    Route::get('category/{id}', [categoryController::class, 'show'])->name('category.show');
    Route::put('category/{id}', [categoryController::class, 'update'])->name('category.update');
    Route::delete('category/{id}', [categoryController::class, 'delete'])->name('category.delete');
    Route::delete('category/delete/all', [categoryController::class, 'deleteAll'])->name('category.delete.all');
    Route::put('category/recive/{id}', [categoryController::class, 'recive'])->name('category.recive');

    Route::get('categories-required', function() {
        return view('debug.categories-required');
    })->name('categories-required');

    Route::group(['middleware' => 'catgories_required'], function () {
        Route::get('book', [bookController::class, 'index'])->name('book');
        Route::get('book/create', [bookController::class, 'create'])->name('book.create');
        Route::post('book', [bookController::class, 'store'])->name('book.store');
        Route::get('book/show/{id}', [bookController::class, 'show'])->name('book.show');
        Route::put('book/{id}', [bookController::class, 'update'])->name('book.update');
    });
});

