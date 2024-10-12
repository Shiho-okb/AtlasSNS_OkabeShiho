<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // fillable属性に投稿内容（content）とユーザーID（user_id）を追加して、登録を許可
    protected $fillable = [
        'user_id',
        'post',
    ];

    //リレーション定義を追加
    //「１対多」の「1」側 → メソッド名は「単数形」でbelongsToを使う
    public function icon_image()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
