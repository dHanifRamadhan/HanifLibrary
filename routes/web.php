<?php

use App\Http\Controllers\Auth\acceptEmailController;
use App\Http\Controllers\Auth\acceptMailsControlller;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\registerController;
use App\Http\Controllers\Auth\forgotPasswordController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CoinsController;
use App\Http\Controllers\contentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\userSettings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes BY Hanif Ramadhan
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Dashboard
// Route::get('dashboard/{search?}', [DashboardController::class, 'index'])->name('dashboard');
// Route::get('/', function () {
//     return redirect()->route('dashboard');
// });

// Route::get('detail/{id}', [DashboardController::class, 'detail'])->name('details.book');

// // Route group untuk form user yang belum login
// Route::group(['middleware' => 'guest'], function () {
//     // Login
//     Route::get('login', [loginController::class, 'login'])->name('login');
//     Route::post('login', [loginController::class, 'authLogin'])->name('auth.login');

//     // Forgot Password
//     Route::get('forgot-password', [forgotPasswordController::class, 'index'])->name('forgot.password');
//     Route::post('forgot-password/send', [forgotPasswordController::class, 'setToken'])->name('set-token.passoword');
//     Route::get('forgot-password/verified/{id}', [forgotPasswordController::class, 'check'])->name('verified.password');
//     Route::post('forgot-password/verified/{id}', [forgotPasswordController::class, 'checkToken'])->name('verified-token.password');
//     Route::get('change/password/{id}', [forgotPasswordController::class, 'change'])->name('change-input.password');
//     Route::post('change/password/{id}', [forgotPasswordController::class, 'changePassword'])->name('change.password');

//     // Register
//     Route::get('register', [registerController::class, 'register'])->name('register');
//     Route::post('register', [registerController::class, 'authRegister'])->name('auth.register');

//     // Accept Email
//     Route::get('accept-email-verification/{id}', [acceptEmailController::class, 'emailVerified'])->name('accept.email.verification');
// });

// // Route group untuk form user yang sudah login
// Route::group(['middleware' => ['auth', 'check.verified']], function () {
//     // Logout
//     Route::post('logout', [loginController::class, 'logout'])->name('logout');

//     // Route group untuk form user dengan role admin
//     Route::group(['middleware' => 'role:admin'], function () {
//         // Officer
//         Route::get('officer', [OfficerController::class, 'index'])->name('officer.index');
//         Route::get('officer/create', function () {
//             return view('admin.officer.create');
//         })->name('officer.create');
//         Route::post('officer', [OfficerController::class, 'store'])->name('officer.store');
//         Route::put('officer/reset-password', [OfficerController::class, 'reset'])->name('officer.reset');
//         Route::put('officer/ban/{id}', [OfficerController::class, 'ban'])->name('officer.ban');
//         Route::put('officer/unban/{id}', [OfficerController::class, 'unban'])->name('officer.unban');
//         Route::delete('officer/delete/{id}', [OfficerController::class, 'delete'])->name('officer.delete');
//     });

//     // Route group untuk form user dengan role admin, officer
//     Route::group(['middleware' => 'role:admin,officer'], function () {
//         // Categories
//         Route::get('category', [CategoriesController::class, 'index'])->name('category.index');
//         Route::post('category', [CategoriesController::class, 'store'])->name('category.store');
//         Route::get('category/show/{id}', [CategoriesController::class, 'show'])->name('category.show');
//         Route::put('category/update/{id}', [CategoriesController::class, 'update'])->name('category.update');
//         Route::delete('category/delete/{id}', [CategoriesController::class, 'delete'])->name('category.delete');
//         Route::delete('category/delete/all', [CategoriesController::class, 'deleteAll'])->name('category.delete.all');
//         Route::get('category/trash', [CategoriesController::class, 'trash'])->name('category.trash');
//         Route::put('category/recive/{id}', [CategoriesController::class, 'recive'])->name('category.recive');
//         Route::get('category/required', function () {
//             return view('debug.categories-required');
//         })->name('category.check');

//         Route::group(['middleware' => 'check.categories'], function () {
//             // Books
//             Route::get('book', [BooksController::class, 'index'])->name('book.index');
//             Route::get('book/create', [BooksController::class, 'create'])->name('book.create');
//             Route::post('book', [BooksController::class, 'store'])->name('book.store');
//             Route::get('book/show/{id}', [BooksController::class, 'show'])->name('book.show');
//             Route::put('book/update/{id}', [BooksController::class, 'update'])->name('book.update');
//             Route::put('book/stock/{id}', [BooksController::class, 'updateStock'])->name('book.stock');
//             Route::delete('book/delete/{id}', [BooksController::class, 'delete'])->name('book.delete');
//         });

//         // Coins
//         Route::get('coin', [CoinsController::class, 'index'])->name('coin.index');
//         Route::post('coin', [CoinsController::class, 'store'])->name('coin.store');
//         Route::delete('coin/delete/{id}', [CoinsController::class, 'delete'])->name('coin.delete');
//     });

//     // Route group untuk form user dengan role librarian
//     Route::group(['middleware' => 'role:librarian'], function () {
//     });
// });

// Debug
// Route::get('session', [registerController::class, 'regisSession'])->name('session');


// Update
Route::get('/home', function () {
    return redirect()->route('dashboard');
});
Route::get('/', [contentController::class, 'dashboard'])->name('dashboard');

Route::group(['middleware' => ['guest']], function () {
    Route::get('books/{id}', [contentController::class, 'detail'])->name('detail');
    Route::get('favorite', [contentController::class, 'favorite'])->name('favorite');
    Route::get('history', [contentController::class, 'history'])->name('history');
    Route::get('settings', [userSettings::class, 'index'])->name('settings');
});

Route::get('auth/login', [loginController::class, 'login'])->name('auth.login');
Route::post('auth/login', [loginController::class, 'loginPost'])->name('auth.login.post');
Route::get('auth/register', [registerController::class, 'register'])->name('auth.register');
Route::post('auth/register', [registerController::class, 'registerPost'])->name('auth.register.post');
Route::get('auth/accept-mail', [acceptMailsControlller::class, 'accept'])->name('auth.accept.mail');
Route::post('auth/failed-mail', [acceptMailsControlller::class, 'resendMail'])->name('auth.failed.mail');

Route::post('logout', [loginController::class, 'logout'])->name('logout');

Route::get('auth/users', [usersController::class, 'index'])->name('users.index');
Route::post('auth/users', [usersController::class, 'store'])->name('users.store');
Route::delete('auth/users/delete', [usersController::class, 'delete'])->name('users.delete');

Route::get('category', [CategoriesController::class, 'index'])->name('category.index');
Route::post('category', [CategoriesController::class, 'store'])->name('category.store');
Route::get('category/show/{id}', [CategoriesController::class, 'show'])->name('category.show');
Route::put('category/update/{id}', [CategoriesController::class, 'update'])->name('category.update');
Route::delete('category/delete/{id}', [CategoriesController::class, 'delete'])->name('category.delete');
Route::delete('category/delete/all', [CategoriesController::class, 'deleteAll'])->name('category.delete.all');
Route::get('category/trash', [CategoriesController::class, 'trash'])->name('category.trash');
Route::put('category/recive/{id}', [CategoriesController::class, 'recive'])->name('category.recive');

Route::get('book', [BooksController::class, 'index'])->name('book.index');
Route::get('book/create', [BooksController::class, 'create'])->name('book.create');
Route::post('book', [BooksController::class, 'store'])->name('book.store');
Route::get('book/show/{id}', [BooksController::class, 'show'])->name('book.show');
Route::put('book/update/{id}', [BooksController::class, 'update'])->name('book.update');
Route::put('book/stock/{id}', [BooksController::class, 'updateStock'])->name('book.stock');
Route::delete('book/delete/{id}', [BooksController::class, 'delete'])->name('book.delete');

Route::get('kirim', [acceptMailsControlller::class, 'kirim']);

// Session
Route::get('/a', function () {
    return redirect()->route('dashboard')->with('success', (object)[
        'message' => 'Berhasil membuat session'
    ]);
});
Route::get('/b', function () {
    return redirect()->route('dashboard')->with('error', (object)[
        'message' => 'Failed membuat session'
    ]);
});
