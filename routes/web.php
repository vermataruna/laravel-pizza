<?php

use App\Http\Controllers\PizzaController;
use App\Http\Controllers\UserOrderController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\FrontEndController::class, 'index'])->name('frontpage');

//Pizza Routes
Route::prefix('pizza')
->as('pizza.')
->middleware('auth','admin')
->controller(PizzaController::class)
->group(function() {
    Route::get('/','index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/{id}/edit','edit')->name('edit');
    Route::put('/{id}/update','update')->name('update');
    Route::delete('/{id}/destroy','destroy')->name('destroy');
});

//User Order Routes
Route::prefix('order')
->as('user.')
->middleware('auth','admin')
->controller(UserOrderController::class)
->group(function() {
    Route::get('/','index')->name('order');
    Route::put('/{id}/status','changeStatus')->name('status');
});