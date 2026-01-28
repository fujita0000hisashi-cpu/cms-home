<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Attributes\Middleware;

class UserController extends Controller
{
  public function showUsers ($status = 'active') {
    // return User::whereStatus($status)->get();
    return view('admin.user');
  }
}