<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    $prefectures = config('prefectures');
    return view('admin.users.create', compact('title', 'prefectures'));
  }

  public function confirm(Request $request)
	{
		$validated = $request->validate([
			'name'          => 'required|string|max:20',
			'name-kana'     => 'required|string|max:20',
      'mail'          => 'required|email',
      'password'      => 'required|string|max:20',
			'phone'         => 'required|regex:/^[0-9-]+$/',
			'postcode'      => 'required|regex:/^[0-9]{7}$/',
			'prefecture'    => 'required',
			'city'          => 'required|string',
			'address_line1' => 'required|string',
			'memo'          => 'required|string',
		]);
    $selectedPrefecture = config('prefectures')[$validated['prefecture']];
		return view('admin.users.confirm', compact('validated', 'selectedPrefecture'));
	}
  
}