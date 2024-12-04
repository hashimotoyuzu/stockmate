@extends('layouts.common')
@section('content')
<div class="container">
    <div class="row justify-content-center mb-2">
        <h1 class="text-center text-primary">登録一覧</h1>
    </div> 
    <div class="row mb-2 justify-content-center">
        <a class="offset-md-10 col-md-2 btn btn-success" href="{{ route('articles.create')}}">持ち物登録</a>
    </div>   
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
                <tr>
                    <th class="text-center">カテゴリー名</th>
                    <th class="text-center">商品名</th>
                    <th class="text-center">在庫数</th>
                    <th class="text-center">消費期限</th>
                </tr>
                @foreach($articles as $article)
                <tr>
                    <td class="text-center">{{ $article->category->name }}</td>
                    <td class="text-center">{{ $article->name }}</td>
                    <td class="text-center">{{ $article->stock }}</td>
                    <td class="text-center">{{ $article->expiration_date }}</td>
                </tr>
                @endforeach
            </table>  
        </div>          
    </div>
</div>
@endsection