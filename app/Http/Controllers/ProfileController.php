<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class ProfileController extends Controller
{

  // 相手のプロフィールページに相手の投稿内容表示のためのメソッド
  public function anotherProfile($user_id){

    // 特定のユーザーの情報を取得
    $user = User::findOrFail($user_id);

    // 特定のユーザーの投稿内容を取得
      // with('user') は、リレーションを使って投稿に紐づくユーザー情報を一緒に取得するメソッド
      // Post モデルには User モデルへのリレーション（user() メソッド）が定義されている
    $posts = Post::with('user')
      ->where('user_id', $user_id)
      ->orderBy('created_at', 'asc') //新しい順に並び替え
      ->get();

    // 相手のプロフィールページの(profiles/another-profile.blade.php)というビューにユーザー情報を渡す
    return view('profiles.another-profile', ['user' => $user, 'posts' => $posts]);
  }


  // プロフィール表示のためのメソッド
  public function profile(){

    // 現在のログインユーザー情報を取得
    $user = Auth::user();

    // ビューにユーザー情報を渡す
    return view('profiles.profile', compact('user'));
  }


  // プロフィール編集のためのメソッド
    // Request は、HTTPリクエストのデータを扱うLaravelのクラス。この $requestパラメータは、フォームやURLから送信されたデータ（POSTデータやGETデータなど）を取得する
    // $id は、ルート（URL）から渡されるパラメータ。このIDを使って、データベースから編集対象のレコードを特定する
  public function profileEdit(Request $request){

    // 現在のログインユーザー情報を取得
    $user = Auth::user();

    // バリデーションを定義
    $request->validate([
      'username' => 'required|string|min:2|max:12',
      'email' => [
        'required',
        'string',
        'email',
        'min:5',
        'max:40',
        Rule::unique('users', 'email')->ignore(Auth::id()),
      ],
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
      ],
      'bio' => 'nullable|string|max:150',
      'icon_image' => 'nullable|image|mimes:jpg,png,bmp,gif,svg'
    ]);

    // プロフィール内容を更新
    $user->update([
      'username' => $request->input('username'),
      'email' => $request->input('email'),
      'bio' => $request->input('bio'),
      'password' => Hash::make($request->input('password'))
    ]);

    // アイコン画像のアップロード処理
    if ($request->hasFile('icon_image')) {
      $image = $request->file('icon_image');
      $imageName = time() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('images'), $imageName);
      $user->icon_image = $imageName;
    }

    $user->save();

    // 編集完了後にトップページにリダイレクト
    return redirect('top');
  }
}
