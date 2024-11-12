<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{
  // トップページに投稿内容表示のためのメソッド
  public function index(){

    // ログインしているユーザーIDを取得
    $user_id = Auth::user()->id;

    // ログインユーザーがフォローしているユーザーのIDを取得
    $following_ids = Auth::user()->followings()->pluck('followed_id')->toArray();

    // 自分とフォローしているユーザーの投稿のみ取得
    // whereIn('user_id', ...) で、上記で取得したIDのいずれかに一致する投稿のみを取得
    $posts = Post::with('user')
        ->whereIn('user_id', array_merge([$user_id], $following_ids))
        ->get();

    //(posts/index.blade.php)という"ビュー"ファイルを直接見に行く(URLはたたきに行っていない)
    //取得した変数を(posts/index.blade.php)に渡しながら移動する
    return view('posts.index',['posts' => $posts]);
  }


  // 投稿登録のためのメソッド
  public function postCreate(Request $request){

    // バリデーション
    $request->validate([
        'post' => 'required|string|min:1|max:150', // 投稿内容は必須、最小1文字、最大150文字
    ]);
    // 変数定義
    $user_id = Auth::id(); // ログインユーザーのID　・auth認証＝「ログインできているかどうか」の選別
    $post = $request->input('post');
    // 投稿をデータベースに登録
    Post::create([
        'user_id' => $user_id,
        'post' => $post,
    ]);
    // 投稿完了後にトップページにリダイレクト
    return redirect('top');
  }


  // 投稿削除のためのメソッド
  public function delete($id){

    // postsテーブルの中で、idが指定された$idのレコードを削除する
    Post::where('id', $id)->delete();
    // 削除完了後にトップページにリダイレクト
    return redirect('top');
  }


  // 投稿編集のためのメソッド
    // Request は、HTTPリクエストのデータを扱うLaravelのクラス。この $requestパラメータは、フォームやURLから送信されたデータ（POSTデータやGETデータなど）を取得する
    // $id は、ルート（URL）から渡されるパラメータ。このIDを使って、データベースから編集対象のレコードを特定する
  public function edit(Request $request, $id){

    // 投稿を取得
    $post = Post::where('id', $id)->first();
    // 投稿フォームから編集して送信された内容を取得
    $newPost = $request->input('post');
    // 投稿内容を更新
    $post->update([
    'post' => $newPost,
    ]);
    // 編集完了後にトップページにリダイレクト
    return redirect('top');
  }


  // フォローページに投稿内容表示のためのメソッド
  public function follow(){

    // フォローしているユーザーのidを取得
      // followings()メソッドは多対多のリレーションが定義されている部分
    $following_id = Auth::user()->followings()->pluck('followed_id');

    // フォローしているユーザーのidを元に、"フォローしているユーザーの投稿内容" を取得
      // with('user') は、リレーションを使って投稿に紐づくユーザー情報を一緒に取得するメソッド
      // Postモデルには Userモデルへのリレーション（user() メソッド）が定義されている
      // whereIn() で、Postsテーブルの'user_id'の中で$following_id(フォローしているユーザー)を取得
    $posts = Post::with('user')->whereIn('user_id', $following_id)->get();

    // フォローしているユーザーのidを元に、"フォローしているユーザーの全情報" を取得
      // whereIn() で、usersテーブルの'id'の中で$following_id(フォローしているユーザー)を取得
    $users = User::whereIn('id', $following_id)->get();

    return view('posts.follow', compact('posts', 'users'));
  }


  // フォロワーページに投稿内容表示のためのメソッド
  public function follower(){

    // フォローされているユーザーのidを取得
      // followers()メソッドは多対多のリレーションが定義されている部分
    $followed_id = Auth::user()->followers()->pluck('following_id');

    // フォローされているユーザーのidを元に、"フォローされているユーザーの投稿内容" を取得
      // with('user') は、リレーションを使って投稿に紐づくユーザー情報を一緒に取得するメソッド
      // Postモデルには Userモデルへのリレーション（user() メソッド）が定義されている
      // whereIn() で、Postsテーブルの'user_id'の中で$follower_id(フォローしているユーザー)を取得
    $posts = Post::with('user')->whereIn('user_id', $followed_id)->get();

    // フォローされているユーザーのidを元に、"フォローされているユーザーの全情報" を取得
    // whereIn() で、usersテーブルの'id'の中で$follower_id(フォローされているユーザー)を取得
    $users = User::whereIn('id', $followed_id)->get();

    return view('posts.follower',compact('posts', 'users')
    );
}

}
