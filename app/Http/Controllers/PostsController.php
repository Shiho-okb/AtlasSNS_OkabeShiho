<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostsController extends Controller
{
    // 投稿内容表示のためのメソッド
    public function index(){
        $posts = Post::get(); //Postモデル（postsテーブル）からレコード情報を取得
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

    public function follow_list(){
        //(posts/follow.blade.php)という"ビュー"ファイルを直接見に行く(URLはたたきに行っていない)
        return view('posts.follow');
    }

    public function follower_list(){
        //(posts/follower.blade.php)という"ビュー"ファイルを直接見に行く(URLはたたきに行っていない)
        return view('posts.follower');
    }
}
