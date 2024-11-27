<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Article extends Model
{
    use HasFactory;

    // 多対1のアソシエーション
    public function category()
    {
        return $this->belongsTo(Category::class); // Article は特定の Category に属する
    }
}
