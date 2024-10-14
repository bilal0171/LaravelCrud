<?php

use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Routes for the application
Route::get('user.welcome', [FrontEndController::class, 'HomePage'])->name('welcome');
Route::get('/', [LoginController::class, 'LoginPage'])->name('logindetails');


// web.php


// Route to display the form (GET request)



Route::get('user_register', [FrontEndController::class, 'UserRegisterPage'])->name('user_register');
Route::get('multiplication', [FrontEndController::class, 'Multiply']);
Route::get('user.create', [FrontEndController::class, 'Create'])->name('user.create');
Route::post('save', [FrontEndController::class, 'Save'])->name('save');

Route::get('user.edit/{user_id}', [FrontEndController::class, 'Edit'])->name('user.edit');
Route::post('user.update/{user_id}', [FrontEndController::class, 'update'])->name('user.update');
Route::get('user.delete/{user_id}', [FrontEndController::class, 'Delete'])->name('user.delete');
Route::get('user.profile/{user_id}', [FrontEndController::class, 'ViewProfile'])->name('user.profile');
Route::get('user.search', [FrontEndController::class, 'Search'])->name('user.search');
Route::post('login', [LoginController::class, 'login'])->name('login');


