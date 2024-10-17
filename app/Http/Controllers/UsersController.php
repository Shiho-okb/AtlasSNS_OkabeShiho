<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function index(){
        //(users/search.blade.php)という"ビュー"ファイルを直接見に行く(URLはたたきに行っていない)
        return view('users.search');
    }

    public function search(){
        // 自分以外のユーザーを取得（現在ログインしているユーザーのIDを除く、全てのusersテーブルのレコードを取得）
          // User:: は App\Models\User モデルを指す
          // id は users テーブルのカラム名
          // != は「異なる」を意味する比較演算子で、「id が指定された値と異なる」という条件を指定
          // get() はクエリを実行し、条件に一致するすべてのレコードをデータベースから取得
        $users = User::where('id', '!=', Auth::id())->get();

        // 自分がフォローしているユーザーのID一覧を取得
          // Auth::user() でログイン中のユーザーを取得
          // followings() で、ログイン中のユーザーがフォローしているユーザーのリストを取得
          // pluck('users.id') で、そのリストからフォローしているユーザーのIDだけを抜き出す
          // toArray() で、結果を配列形式に変換し、$followingIds に代入
        $followingIds = Auth::user()->followings()->pluck('users.id')->toArray();

        // 検索ページのビューにユーザー情報とフォローID情報を渡す
        return view('users.search', ['users' => $users, 'followingIds' => $followingIds]);
    }
}
