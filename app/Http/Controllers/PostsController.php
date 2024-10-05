<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index(){
        return view('posts.index');
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
