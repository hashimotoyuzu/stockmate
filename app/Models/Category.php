<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Article;

class Category extends Model
{
    use HasFactory;
    
    // 多対1のアソシエーション
    public function user()
    {
        return $this->belongsTo(User::class); // Category は特定の User に属する
    }
    // 1対多のアソシエーション
    public function articles()
    {
        return $this->hasMany(Article::class); // Category は複数の Article を持つ
    }
}
