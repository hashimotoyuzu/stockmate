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
        })->where('delete_flag', false)->orderBy('expiration_date', 'asc')->get();
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
    public function edit(Request $request, $id){
        //dd($id);
        $article = Article::find($id);
        //dd($article);
        $categories = \Auth::user()->categories;
        //dd($categories);
        return view('articles.edit', ['article'=> $article, 'categories'=> $categories]);
    }

     // 登録商品変更処理
     public function update(Request $request, $id)
     {  
        //dd($id);
         // バリデーション
         $request->validate([
             'name' => 'required|max:20',
             'expiration_date' => 'required|date',
             'stock' => 'required|integer',
         ]);
        
         $article = Article::find($id);
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
         //商品削除処理
     public function destroy(Request $request, $id){
        //dd($id);
        $article = Article::find($id);
        //$articles ->delete();
        $article->delete_flag = true;
        $article->save();
        return redirect()->route('articles.index');
    }

    public function show(Request $request){
        //検索フォームに入力された値を取得
        $keyword = $request->input('keyword');
        $category = $request->input('category');
        $name = $request->input('name');
        $stock = $request->input('stock');
        $xpiration_date = $request->input('xpiration_date');

        $query = Articles::query();
        //テーブル結合
        $query->join('categories', function ($query) use ($request) {
            $query->on('user_id', '=', 'user_id');
            })->join('articles', function ($query) use ($request) {
            $query->on('category_id', '=', 'category_id');
            });

        if(!empty($keyword)) {
            $query->where(' ', 'LIKE', "%{$keyword}%");
        }

        if(!empty($category)) {
            $query->where('category', 'LIKE', $category);
        }

        if(!empty($name)) {
            $query->where('name', 'LIKE', $name);
        }

        if(!empty($stock)) {
            $query->where('stock', 'LIKE', $stock);
        }

        if(!empty($expiration_date)) {
            $query->where('expiration_date', 'LIKE', $expiration_date);
        }

        $items = $query->get();
        
        return redirect()->route('articles.index');
    }
}
