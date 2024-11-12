<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */

    //映し出すためのメソッド(新規登録フォームを表示)
    public function create(): View
    {
        //auth/register.blade.phpという"ビュー"をブラウザに表示させる
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    //新規登録機能のためのメソッド(新規登録データを受け取る処理)
    public function store(Request $request): RedirectResponse
    {

        // バリデーションを定義
        $request->validate([
            'username' => 'required|string|min:2|max:12',
            'email' => 'required|email|min:5|max:40|unique:users,email',
            'password' => [
                'required',
                'string',
                'regex:/^[a-zA-Z0-9]+$/',  // 英数字のみ
                'min:8',
                'max:20',
                'confirmed'  // password_confirmationと一致しているか
            ],
            'password_confirmation' => [
                'required',
                'string',
                'regex:/^[a-zA-Z0-9]+$/',  // 英数字のみ
                'min:8',
                'max:20'
            ]
        ]);

        // ユーザーの新規作成
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //$username をセッションに保存
        //$usernameが未定義だとadded()メソッド内で使用できないため、セッションを使ってデータを渡す
        $request->session()->put('username', $request->username);

        //ユーザーが新規登録フォームを送信すると処理完了後に↓
        //「/added」という"URL"をたたきに行く
        return redirect('added');
    }

    //新規追加分を映し出すためのメソッド
    public function added(): View
    {
        //セッションから $username を取得
        $username = session('username');

        //(auth/added.blade.php)という"ビュー"ファイルを直接見に行く(URLはたたきに行っていない)
        return view('auth.added',['username' => $username]);
    }
}
