<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory, SoftDeletes;

    // ブラックリスト。ここに記載されたカラムは書き込み禁止。この定義を削除すると登録時にエラー発生するので注意。
    protected $guarded = [];
}
