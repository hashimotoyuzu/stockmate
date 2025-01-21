<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticlesController extends Controller
{
    // 商品一覧画面表示
    public function index(Request $request){
        $articles = Article::whereHas('category', function ($query) {
            $query->where('user_id', auth()->id());
        })->orderBy('expiration_date', 'asc')->get();
        return view('articles.index', ['articles' => $articles]);
    }

    // 商品登録画面表示
    public function create(Request $request){
        // ログインしているユーザーが追加したカテゴリー一覧を取得
        $categories = \Auth::user()->categories;
        return view('articles.create', ['categories'=> $categories]);
    }

    // 商品登録処理
    public function store(Request $request)
    {  
        // バリデーション
        $request->validate([
            'name' => 'required|max:20',
            'expiration_date' => 'required|date',
            'stock' => 'required|integer',
        ]);
        $article = new Article;
        $article->category_id = $request->category_id;
        $article->name = $request->name;
        $article->expiration_date= $request->expiration_date;
        $article->stock = $request->stock;
        // もし、メモが記入されていたら
        if($request->memo !== null){
            $article->memo = $request->memo;
        }
        // データベースに商品保存
        $article->save();
        // 商品一覧画面へリダイレクト
        return redirect()->route('articles.index');
    }    

    // 登録商品変更処理
    public function edit(Request $request){
        return view('edit', ['categories'=> $categories]);
    }

     // 登録商品変更処理
     public function update(Request $request)
     {  
         // バリデーション
         $request->validate([
             'name' => 'required|max:20',
             'expiration_date' => 'required|date',
             'stock' => 'required|integer',
         ]);
         $article->category_id = $request->category_id;
         $article->name = $request->name;
         $article->expiration_date= $request->expiration_date;
         $article->stock = $request->stock;
         // もし、メモが記入されていたら
         if($request->memo !== null){
             $article->memo = $request->memo;
         }
         // データベースに商品保存
         $article->save();
         // 商品一覧画面へリダイレクト
         return redirect()->route('articles.index');
     }    
}
