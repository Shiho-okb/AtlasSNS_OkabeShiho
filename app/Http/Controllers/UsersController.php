<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
  //ユーザー一覧のためのメソッド
  public function index(){

    // 自分以外の全てのユーザーを取得（現在ログインしているユーザーのIDを除く、全てのusersテーブルのレコードを取得）
    // User:: は App\Models\User モデルを指す
    // id は users テーブルのカラム名
    // != は「異なる」を意味する比較演算子で、「id が指定された値と異なる」という条件を指定
    // get() はクエリを実行し、条件に一致するすべてのレコードをデータベースから取得
    $users = User::where('id', '!=', Auth::id())->get();

    // 検索ページの(users/search.blade.php)というビューにユーザー情報を渡す
    return view('users.search', ['users' => $users,]);
  }

  //ユーザー検索のためのメソッド
  public function search(Request $request){

    // 検索ワード（name属性が「keyword」で指定されているフォームの値）を$keyword変数で取得
    $keyword = $request->input('keyword');

    if (!empty($keyword)) {
      // 検索ワードに部分一致するユーザー名を持つユーザーを取得（あいまい検索）
      $users = User::where('username', 'like', '%' . $keyword . '%')
      // 自分以外のユーザーを対象にする
      ->where('id', '!=', Auth::id())->get();
    } else {
      // 検索ワードが空なら、自分以外の全てのユーザーを取得
      $users = User::where('id', '!=', Auth::id())->get();
    }

    // 検索ページの(users/search.blade.php)というビューにユーザー情報と検索ワードを渡す
    return view('users.search', [
      'users' => $users,
      'keyword' => $keyword,
    ]);
  }
}
