<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



require __DIR__ . '/auth.php';

//ログイン後の人しか使えないルーティングのグループ(まとまり)
Route::middleware('auth')->group(function () {

  Route::get('top', [PostsController::class, 'index']);

  //ログアウトのための(名前付き)ルーティング
  Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

  //投稿登録のためのルーティング
  Route::post('/post/create', [PostsController::class, 'postCreate']);

  //投稿削除のためのルーティング
  //post送信と一緒に送られるパラメータを受け取るには、web.php内に変数名を用意する必要がある。書き方は通常の「$変数名」ではなく「{変数名}」の形。
  Route::post('/post/{id}/delete', [PostsController::class, 'delete']);

  //投稿編集のためのルーティング
  //post送信と一緒に送られるパラメータを受け取るには、web.php内に変数名を用意する必要がある。書き方は通常の「$変数名」ではなく「{変数名}」の形。
  Route::post('/post/{id}/edit', [PostsController::class, 'edit']);

  //ユーザー一覧のためのルーティング
  Route::get('/search', [UsersController::class, 'index']);

  //ユーザー検索のためのルーティング
  Route::post('/search', [UsersController::class, 'search']);

  //フォロー・フォロー解除のためのルーティング
  Route::post('/toggleFollow/{user_id}', [FollowsController::class, 'toggleFollow']);

  //フォローリスト表示のためのルーティング
  Route::get('follow-list', [PostsController::class, 'follow']);

  //相手のプロフィール表示のためのルーティング
  Route::get('/another-profile/{user_id}', [ProfileController::class, 'anotherProfile']);

  //フォロワーリスト表示のためのルーティング
  Route::get('follower-list', [PostsController::class, 'follower']);

  //プロフィール表示のためのルーティング
  Route::get('profile', [ProfileController::class, 'profile']);

  //プロフィール編集のためのルーティング
  Route::post('profile', [ProfileController::class, 'profileEdit']);
});
