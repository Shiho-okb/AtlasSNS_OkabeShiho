<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Post;

class ProfileController extends Controller
{
    public function profile(){
        return view('profiles.profile');
    }

    // 相手のプロフィールページに相手の投稿内容表示のためのメソッド
    public function anotherProfile($user_id){

        // 特定のユーザーの投稿内容を取得
        // with('user') は、リレーションを使って投稿に紐づくユーザー情報を一緒に取得するメソッド
        // Post モデルには User モデルへのリレーション（user() メソッド）が定義されている
        $posts = Post::with('user')->where('user_id', $user_id)->get();

        return view('profiles.another-profile', compact('posts'));
    }
}
