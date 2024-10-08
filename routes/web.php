<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
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

  Route::get('profile', [ProfileController::class, 'profile']);

  Route::get('search', [UsersController::class, 'index']);

  Route::get('follow-list', [PostsController::class, 'follow_list']);
  Route::get('follower-list', [PostsController::class, 'follower_list']);

  Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout'); //ログアウトのための(名前付き)ルーティング

});
