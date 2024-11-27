@extends('layouts.common')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-bordered table-striped">
                <tr>
                    <th class="text-center">カテゴリー名</th>
                    <th class="text-center">商品名</th>
                    <th class="text-center">在庫数</th>
                    <th class="text-center">消費期限</th>
                </tr>
                <tr>
                    <td class="text-center">食品</td>
                    <td class="text-center">牛乳</td>
                    <td class="text-center">1</td>
                    <td class="text-center">2024-11-30</td>
                </tr>
                @foreach($articles as $article)
                <tr>
                    <td class="text-center">{{ $article->category->name }}</td>
                    <td class="text-center">{{ $article->name }}</td>
                    <td class="text-center">{{ $article->stock }}</td>
                    <td class="text-center">{{ $article-> expiration_date }}</td>
                </tr>
                @endforeach
            </table>    
    </div>
</div>
@endsection