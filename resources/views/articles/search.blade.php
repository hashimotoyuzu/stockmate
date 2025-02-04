@extends('layouts.common')
@section('content')
<div class="container">
    <div class="row justify-content-center mb-2">
        <h1 class="text-center text-primary">持物検索</h1>
    </div> 
    <div class="row justify-content-center">
        <div class="col-md-12">
        <form action="{{ route('articles.select_articles')}}">
            <!-- @csrf -->
            <div class="row">
                <div class="col-12 mb-2 mt-2">
                    <div class="form-group">
                    <input type="search" name="keyword" class="form-control" placeholder="キーワード" value="{{ old('keyword') ? old('keyword') : $keyword }}">
                    </div>
                </div>
                <div class="col-12 mb-2 mt-2">
                    <div class="form-group">
                    <input type="search" name="stock" class="form-control" placeholder="ストック">
                    </div>
                </div>
                <div class="form-check-inline mb-1">
                @foreach($categories as $category)
                <div class="form-check inline">
                    <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}" id="flexCheckDefault" {{ in_array($category->id, $category_ids) ? 'checked' : ''}}>
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ $category->name }}
                    </label>
                </div>
                @endforeach
            </div>
                <div class="col-12 mb-2 mt-2">
                    <button type="submit" class="btn btn-primary w-100">検索</button>
                </div>
            </div> 
        </form>
        </div>          
    </div>
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-12 tect-center">
                <p>検索結果は {{ count($articles) }}件です</p>       
            </div>    
        </div>    
        @if(count($articles) > 0)
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
        @endif    
    </div>
</div>
@endsection