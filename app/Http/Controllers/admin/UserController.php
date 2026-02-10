<?php

namespace App\Http\Controllers\admin;

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

  public function confirm (Request $request) {
    $validated = $request->validate([
      'name'          => 'required|string|max:20',
      'name_kana'     => 'required|string|max:20',
      // 'mail'          => 'required|email',
      'mail'          => ['required', 'email', 'unique:users,email'],
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

  public function send (Request $request) {
    $user = new User();
    $user->name          = $request->name;
    $user->name_kana     = $request->name_kana;
    $user->email         = $request->mail;
    $user->password      = $request->password;
    $user->phone         = $request->phone;
    $user->zipcode      = $request->postcode;
    $user->prefecture    = $request->prefecture;
    $user->city          = $request->city;
    $user->address = $request->address_line1;
    $user->remarks          = $request->memo;
    $user->save();
    return view('admin.users.send', ['user' => $user]);
  }
}
