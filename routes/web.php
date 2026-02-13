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

// admin
Route::get('/admin', [AdminController::class, 'showTop'])->name('admin.index');
Route::get('/admin/contact', [AdminContactController::class, 'showContacts'])->name('admin.contact.index');
Route::get('/admin/contact/{id}/edit', [AdminContactController::class, 'edit'])->name('admin.contact.edit');
Route::put('/admin/{contact}', [AdminContactController::class, 'update'])->name('admin.contact.update');

// ユーザー登録
// 登録
Route::get('admin/users/create', [UserController::class, 'createUser'])->name('admin.users.create');
Route::get('admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');

// 確認(共通)
Route::post('admin/users/confirm', [UserController::class, 'confirm'])->name('admin.users.confirm');

// 確定(保存)
Route::post('admin/users/send', [UserController::class, 'send'])->name('admin.users.send');


// ユーザー一覧
Route::get('admin/users/{status?}', [UserController::class, 'showUsers'])->name('admin.users');
