<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ContactController as AdminContactController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contact\ContactController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function() {
    return 'Hello World!';
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.show');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/admin', [AdminController::class, 'showTop'])->name('admin.index');
Route::get('/admin/contact', [AdminContactController::class, 'showContacts'])->name('admin.contact.index');
Route::get('/admin/contact/{id}/edit', [AdminContactController::class, 'edit'])->name('admin.contact.edit');
Route::put('/admin/{contact}', [AdminContactController::class, 'update'])->name('admin.contact.update');

// Route::view('/users', 'admin.users')->name('admin.users');
Route::get('/users/create', [UserController::class, 'createUser'])->name('admin.users.create');
Route::post('/users/confirm', [UserController::class, 'confirm'])->name('admin.users.confirm');
Route::post('/users/send', [UserController::class, 'send'])->name('admin.users.send');
Route::get('/users/{status?}', [UserController::class, 'showUsers'])->name('admin.users');
