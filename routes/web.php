<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function(){return redirect(route('members_index'));})->name('home');



Route::get('/members', [App\Http\Controllers\MembersController::class, 'index'])->name('members_index');
Route::get('/members/create', [App\Http\Controllers\MembersController::class, 'create'])->name('members_create');
Route::post('/members', [App\Http\Controllers\MembersController::class, 'store'])->name('members_store');
Route::get('/members/{id}', [App\Http\Controllers\MembersController::class, 'edit'])->name('members_edit');
Route::put('/members/{id}', [App\Http\Controllers\MembersController::class, 'update'])->name('members_update');
Route::delete('/members/{id}', [App\Http\Controllers\MembersController::class, 'destroy'])->name('members_destroy');
