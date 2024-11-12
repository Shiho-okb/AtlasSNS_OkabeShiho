<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'bio',
        'icon_image',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    //【モデル：コントローラーから呼び出され、特定のデータに対して処理を行う場所】

    //【リレーション: データベース間の関係を定義】
    // フォロー・フォロワーのリレーションの定義
    // ①自分がフォローしているユーザーとのリレーション
    public function followings(){
    return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
    }

    // ②自分がフォローされているユーザーとのリレーション
    public function followers(){
    return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
    }

    // 以下のメソッドを follow.php ではなく user.php に記述する理由
    // →フォローする・解除する操作が 「ユーザーの行動や関係」 に基づいているため
    // Follow.php は「フォロー関係」そのものを表現するモデル

    //【メソッド: そのモデルに関連する操作やビジネスロジック(そのモデルに関連する固有の処理)を定義】
    // フォローするメソッド
    public function follow($user_id){
        $this->followings()->attach($user_id);
    }

    // フォロー解除するメソッド
    public function unfollow($user_id){
        $this->followings()->detach($user_id);
    }

    // ユーザーが指定のユーザーをフォローしているか確認するメソッド
    public function isFollowing($user_id){
        return $this->followings()->where('followed_id', $user_id)->exists();
    }

}
