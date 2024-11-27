<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    public function index(Request $request){
        // dd($request);
        // $articles = Article::where('category_id', \Auth::id())->orderBy('expiration_date', 'asc')->get();
        $articles = Article::whereHas('category', function ($query) {
            $query->where('user_id', auth()->id());
        })->orderBy('expiration_date', 'asc')->get();
        return view('articles.index', ['articles' => $articles]);
    }
    
    public function add()
    {
        return view('categories.create');
    }
}
