<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * ログインフォームを表示する
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * ユーザーのログイン処理を実行する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // 1. リクエストのデータを検証する
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // 2. 認証を試みる
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // 認証に成功したら、セッションを再生成する
            $request->session()->regenerate();

            // 管理画面TOPにリダイレクト
            return redirect()->intended(route('admin.index'));
        }

        // 認証に失敗した場合は、ログインページにリダイレクトする
        return back()->withErrors([
            'email' => 'ログイン情報が正しくありません。メールアドレスかパスワードが間違いないかご確認ください。',
        ])->onlyInput('email');
    }
}