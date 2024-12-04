<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{

    // カテゴリー新規投稿画面表示
    public function create(Request $request){
        return view('categories.create');
    }

    // カテゴリー追加処理
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|max:20',
        ]);

        $category = new Category;
        $category->user_id = \Auth::id();
        $category->name = $request->name;

        // カテゴリーをデータベースに保存
        $category->save();

        // 商品登録画面へリダイレクト
        return redirect()->route('articles.create');
    }

}
