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
            'category_id' => 'required',
            'name' => 'required|max:20',
            'expiration_date' => 'required|date|after_or_equal:today',
            'stock' => 'required|integer',
        ], [
        // 期限切れは登録しないため当日から未来日付限定に設定  
            'expiration_date.after_or_equal' => '日付は今日以降を指定してください。',
        // 1以下や小数点表記は入力できないように設定    
            'stock.integer' => 'ストックは整数である必要があります。',
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
        return redirect()->route('articles.index')
                        //flashmessageを表示
                        ->with('success', '商品名: ' . $article->name . 'を登録しました');
    }    

    // 登録商品変更画面表示
    public function edit(Request $request, $id){
        $article = Article::find($id);
        $categories = \Auth::user()->categories;
        return view('articles.edit', ['article'=> $article, 'categories'=> $categories]);
    }

     // 登録商品変更処理
     public function update(Request $request, $id)
     {  
         // バリデーション
         $request->validate([
            'name' => 'required|max:20',
            'expiration_date' => 'required|date|after_or_equal:today',
            'stock' => 'required|integer',
        ], [
            'expiration_date.after_or_equal' => '日付は今日以降を指定してください。',
            'stock.integer' => 'ストックは整数である必要があります。',
        ]);
        // 指定idのレコードデータを出力
         $article = Article::find($id);
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
         return redirect()->route('articles.index')
                        //flashmessageを表示
                        ->with('success','商品名: '.$article->name.'を更新しました');
     }    
         // 商品削除処理
     public function destroy(Request $request, $id){
        $article = Article::find($id);
        $article->delete_flag = true;
        $article->save();
        return redirect()->route('articles.index')
                        //flashmessageを表示
                        ->with('success', '商品名: ' . $article->name . 'を削除しました');
    }
        // 商品検索処理
    public function search(Request $request){
        // ログインしているユーザーが登録した商品から項目ごとに検索
        $categories = \Auth::user()->categories;
        $category_ids = [];
        $keyword = '';
        $articles = [];
        $stock = '';
        $expiration_date = '';

        return view('articles.search', ['keyword' => $keyword, 'categories' =>  $categories, 'articles' => $articles, 'category_ids' => $category_ids, 'stock' => $stock, 'expiration_date' => $expiration_date]);
     }

    public function select_articles(Request $request)
    {
        $keyword = $request->input('keyword', '');
        $stock = $request->input('stock', '');
        $category_ids = $request->input('categories', []);
        $expiration_date = $request->input('expiration_date');

        // ログインしているユーザーが登録したカテゴリー一覧
        $categories = \Auth::user()->categories;

        // クエリビルダーで検索条件を動的に構築
        $query = Article::query()->whereHas('category', function ($query) {
            $query->where('user_id', \Auth()->id());
        // 削除したものは表示しない  
        })->where('delete_flag', 0);

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
        }

        if (!empty($category_ids) && is_array($category_ids)) {
            $query->whereIn('category_id', $category_ids);
        }

        if (!empty($stock)) {
            $query->where('stock', $stock); 
        }

        if (!empty($expiration_date)) {
            $query->where('expiration_date', $expiration_date);
        }

        $articles = $query->get();
        return view('articles.search', [
            'keyword' => $keyword,
            'articles' => $articles,
            'categories' => $categories,
            'category_ids' => $category_ids,
            'stock' => $stock,
            'expiration_date' => $expiration_date
        ]);
    }
}