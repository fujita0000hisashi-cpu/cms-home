<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
  public function showTop () {
    $title = 'TOP';
    return view('admin.index', compact('title'));
  }
}