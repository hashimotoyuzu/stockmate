@extends('layouts.common')
@section('content')
<div class="container">
    <div class="row justify-content-center mb-2">
        <h1 class="text-center text-primary">登録一覧</h1>
    </div> 
    <div class="row mb-2 justify-content-center">
        <a class="offset-md-10 col-md-2 btn btn-success" href="{{ route('articles.create')}}">持ち物登録</a>
    </div> 
    
    <div class="search">
        <form action="{{ route('articles.index') }}" method="GET">
            @csrf
            <div class="form-group">
                <div>
                    <label for="">キーワード
                    <div>
                        <input type="text" name="keyword" value="{{ $keyword }}">
                    </div>
                    </label>
                </div>
                <div>
                    <label for="">カテゴリー名
                    <div>
                        <select name="category" data-toggle="select">
                            <option value="">全て</option>
                            @foreach($articles as $article)
                                <option value="{{ $article->category->name() }}"
                                 @if($category='{{ $article->category->name }}')
                                 selected @endif>{{ $categories->getCategory() }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    </label>
                </div>
                <div>
                    <label for="">商品名
                    <div>
                        <input type="text" name="name" value="{{ $name }}">
                    </div>
                    </label>
                </div>
                <div>
                    <label for="">在庫数
                    <div>
                        <input type="text" name="stock" value="{{ $stock }}">
                    </div>
                    </label>
                </div>
                <div>
                    <label for="">使用期限
                    <div>
                        <input type="date" name="expiration_date" value="{{ $expiration_date }}">
                    </div>
                    </label>
                </div>
                <div>
                    <input type="submit" class="btn btn-warning" value="検索">
                </div>
            </div>
        </form>
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
                    <td class="text-center">{{ $article->expiration_date }}
                    <a class="btn btn-primary" href="{{ route('articles.edit', $article->id) }}">変更</a>
                    <form action = "{{ route('articles.destroy', $article->id) }}" method = "POST">
                        @csrf
                        @method('DELETE')
                        <div class="col-12 mb-2 mt-2">
                        <input type = 'submit' value = '削除' class="btn btn-danger">
                        </div>
                    </form> 
                    </td>
                </tr>
                @endforeach
            </table>  
        </div>          
    </div>
</div>
@endsection