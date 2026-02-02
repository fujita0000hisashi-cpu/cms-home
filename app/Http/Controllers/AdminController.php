<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
  // public function showUsers ($status = 'active') {
  //   $user = User::whereStatus($status)->get();
  //   return view('admin.user', compact('user'));
  // }
  public function showTop () {
    $title = 'TOP';
    return view('admin.index', compact('title'));
  }
}