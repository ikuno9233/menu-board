<?php

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

use Illuminate\Support\Facades\Route;

Route::namespace('\App\Http\Actions')->group(function () {
    Route::get('/', 'ShowMainAction')->name('show_main');
    Route::get('edit', 'ShowEditFormAction')->name('show_edit_form');
    Route::post('store', 'StoreAction')->name('store');
});
