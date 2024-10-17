<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }

    //【コントローラー：リクエストの処理やビューとの連携がメインの役割】
    // ユーザーがフォローのリクエストを送信した場合、そのリクエストを受け取るのがコントローラーで、フォロー処理自体はモデルに任せる

    // フォロー・フォロー解除の処理を一つのメソッドにまとめる記述
    // $user_id は、ルート（URL）から渡されるパラメータ。このuser_idを使って、データベースから編集対象のレコードを特定する
    public function toggleFollow($user_id){

        // 現在ログインしているユーザーを取得
        $follower = Auth::user();
        // 現在ログインしているユーザーが、特定のユーザー（$user->id）をフォローしているかどうかを判定し、その結果を $is_following に格納
        $is_following = $follower->isFollowing($user_id);

        // フォロー状態に応じて適切な操作を実行
        if ($is_following) {
            // フォローを解除
            $follower->unfollow($user_id);
        } else {
            // フォローする
            $follower->follow($user_id);
        }

        // 処理後、元のページにリダイレクト
        return back();
    }
}
