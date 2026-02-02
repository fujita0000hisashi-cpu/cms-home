<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
  // public function showUsers ($status = 'active') {
  //   $user = User::whereStatus($status)->get();
  //   return view('admin.user', compact('user'));
  // }
  public function showUsers () {
    $users = User::All();
    $title = 'アカウント一覧';
    return view('admin.users', compact('users', 'title'));
  }

  public function createUser() {
    $title = 'アカウント新規登録';
    return view('admin.users.create', compact('title'));
  }
}