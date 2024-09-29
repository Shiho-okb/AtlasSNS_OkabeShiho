<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */

    //映し出すためのメソッド
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */

    //ログイン機能のためのメソッド
    public function store(LoginRequest $request): RedirectResponse
    {
        //POST通信でフォームから値が送られる場合は、引数に用意してある$request変数の中に値(パラメータ)が渡される
        $request->authenticate();

        $request->session()->regenerate();

        //ユーザーをログイン後に特定のページにリダイレクトするためのコード
        return redirect()->intended('top');
    }

    //ログアウト機能のためのメソッド
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
