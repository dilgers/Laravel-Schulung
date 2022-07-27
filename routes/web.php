<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminController;

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


Route::get('/', [TestController::class, 'index'])->name('index');

// Route::get('/kontakt', [TestController::class, 'kontakt'])->name('kontaktFormular');

Route::get('/kontakt/{country?}', [TestController::class, 'kontakt'])->name('kontaktFormular');

// TestController::class wird als vollen Pfad interpretiert

/*
Route::prefix('/post')->group(function () {
    Route::get('/', []);
    Route::get('/edit', []);
    Route::get('/show', []);
});

Route::prefix('/post')->controller(TestController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/edit', 'test');
    Route::get('/show', 'test2');
});

Route::prefix('/post')->name('post')->controller(TestController::class)->group(function () {
    Route::get('/', 'index')->name('list');
    Route::get('/edit', 'test')->name('edit');
    Route::get('/show', 'test2')->name('show');
});*/


Route::post('/kontakt', [TestController::class, 'send'])->name('sendFormular');

// Route::prefix('/admin')->name('admin.')->middleware('admin.password:test1234')->group(function () {
Route::prefix('/admin')->name('admin.')->middleware('admin.password:test1234')->group(function () {
    Route::get('/contact', [AdminController::class, 'contact'])->name('contact');
    Route::get('/contact/{contact_request}/done', [AdminController::class, 'contactDone'])->name('contactDone');
    Route::delete('/contact/{contact_request}', [AdminController::class, 'contactDelete'])->name('contactDelete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
