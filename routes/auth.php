<?php //URLの有効化

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

//ログイン前の人のルーティングのグループ(まとまり)
Route::middleware('guest')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login'); //映し出すためのルーティング
    Route::post('login', [AuthenticatedSessionController::class, 'store']); //ログイン機能のためのルーティング

    Route::get('register', [RegisteredUserController::class, 'create']); //映し出すためのルーティング
    Route::post('register', [RegisteredUserController::class, 'store']); //新規登録機能のためのルーティング

    Route::get('added', [RegisteredUserController::class, 'added']);
    Route::post('added', [RegisteredUserController::class, 'added']);

});
