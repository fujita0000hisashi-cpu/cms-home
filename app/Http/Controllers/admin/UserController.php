<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  // public function showUsers ($status = 'active') {
  //   $user = User::whereStatus($status)->get();
  //   return view('admin.user', compact('user'));
  // }
  public function showUsers () {
    $title = 'アカウント一覧';
    $users = User::All();
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
      'email'          => ['required', 'email', 'unique:users,email'],
      'password'      => 'required|string|max:20',
      'phone'         => 'required|regex:/^[0-9-]+$/',
      'zipcode'      => 'required|regex:/^[0-9]{7}$/',
      'prefecture'    => 'required',
      'city'          => 'required|string',
      'address' => 'required|string',
      'remarks'          => 'required|string',
    ];
    if($mode === "create") {
      $rules['email'][] = Rule::unique('users', 'email');
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

  public function store(Request $request) {
    $rules = [
      'mode' => ['required', Rule::in(['create', 'edit'])],
      'name'          => 'required|string|max:20',
      'name_kana'     => 'required|string|max:20',
      'email'          => ['required', 'email', 'unique:users,email'],
      'password'      => 'required|string|max:20',
      'phone'         => 'required|regex:/^[0-9-]+$/',
      'zipcode'      => 'required|regex:/^[0-9]{7}$/',
      'prefecture'    => 'required',
      'city'          => 'required|string',
      'address' => 'required|string',
      'remarks'          => 'required|string',
    ];
    $validated = $request->validate($rules);

    $user = User::create($validated);
    return redirect()
      ->route('admin.users.send', ['id' => $user->id])
      ->with(['status' => '登録しました。']);
  }

  public function send ($id) {
    $user = User::findOrFail($id);
    $selectedPrefecture = config('prefectures')[$user['prefecture']];
    return view('admin.users.send', ['user' => $user, 'selectedPrefecture' => $selectedPrefecture]);
  }

  public function edit($id) {
    $title = 'アカウント編集';
		$user = User::findOrFail($id);
    $prefectures = config('prefectures');
    return view('admin.users.edit', compact('title', 'prefectures', 'user'));
  }

  public function update(Request $request, $id) {
    $user = User::findOrFail($id);
    $rules = [
      'name'          => 'required|string|max:20',
      'name_kana'     => 'required|string|max:20',
      'email'          => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
      'password'      => 'required|string|max:20',
      'phone'         => 'required|regex:/^[0-9-]+$/',
      'zipcode'      => 'required|regex:/^[0-9]{7}$/',
      'prefecture'    => 'required',
      'city'          => 'required|string',
      'address' => 'required|string',
      'remarks'          => 'required|string',
    ];
    $validated = $request->validate($rules);

    $updateData = $validated;

    unset(
      $updateData['mode'],
      $updateData['user_id'],
      $updateData['password'],
      $updateData['password_comfirmation']
    );

    if ($request->filled('password')) {
      $updateData['password'] = Hash::make($request->input('password'));
    }

    $user->update($updateData);

    return redirect()
      ->route('admin.users.send', ['id' => $user->id])
      ->with('status', '更新しました。');

  }

  public function back(Request $request) {
    $mode = $request->input('mode');

    if ($mode === 'create') {
      return redirect()
        ->route('admin.users.create')
        ->withInput($request->except('_token'));
    }

    // edit
    $id = $request->input('user_id');
    return redirect()
      ->route('admin.users.edit', ['id' => $id])
      ->withInput($request->except('_token'));
  }
}
