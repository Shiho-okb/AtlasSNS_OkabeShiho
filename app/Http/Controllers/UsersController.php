<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function index(){
        //(users/search.blade.php)という"ビュー"ファイルを直接見に行く(URLはたたきに行っていない)
        return view('users.search');
    }
}
