<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
    $mode = $request->input('mode');
    $userId = $request->input('user_id');
    $rules = [
      'mode' => ['required', Rule::in(['create', 'edit'])],
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
    ];
    if($mode === "create") {
      $rules['email'][] = Rule::unique('users', 'mail');
    } else {
      // editの時はid必須
      $rules['user_id'] = ['required', 'integer', 'exists:users,id'];
      $rules['email'] = Rule::unique('users', 'email')->ignore($userId);
    }
    $validated = $request->validate($rules);
        
    $selectedPrefecture = config('prefectures')[$validated['prefecture']];

  // confirm から「戻る」先 (create or edit)
  $backRoute = ($validated['mode'] === 'create')
    ? route('admin.users.create')
    : route('admin.users.edit', ['id' => $validated['user_id']]);

    // return view('admin.users.confirm', compact('validated', 'selectedPrefecture'));
    return view('admin.users.confirm', [
      'inputs' => $validated,
      'backRoute' => $backRoute,
      'selectedPrefecture' => $selectedPrefecture
    ]);

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

  public function edit($id) {
		$user = User::findOrFail($id);
    $title = 'アカウント編集';
    $prefectures = config('prefectures');
    return view('admin.users.edit', compact('title', 'prefectures', 'user'));
  }
}
