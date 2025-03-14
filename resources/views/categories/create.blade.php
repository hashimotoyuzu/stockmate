@extends('layouts.common')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-2">
        <h1 class="text-center text-primary">新規カテゴリーの追加</h1>
    </div> 

    @if(session('message'))
    <h2 class="text-center text-danger">
        {{ session('message') }}
    </h2>
    @endif
    @if(session('success'))
        <div class="alert alert-success mt-1">{{ session('success') }}</div>
    @endif

    <div class="row container">
        <form action="{{ route('categories.store')}}" method="POST">
            @if (count($errors) > 0)
                <ul class="alert alert-danger">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
                </ul>
            @endif
            @csrf
            <div class="row">
                <div class="col-12 mb-2 mt-2">
                    <div class="form-group">
                    <p id="count"></p>
                    <input type="text" name="name" class="form-control" placeholder="名前を50文字以内で入力してください" id="name">
                    </div>
                </div>
                <div class="col-12 mb-2 mt-2">
                    <button type="submit" class="btn btn-primary w-100">保存</button>
                </div>
            </div> 
        </form>
    </div>
    <div class="row justify-content-center mt-4">
        <h3 class="text-center text-success mb-3">登録済みのカテゴリー一覧</h3>
        @if(!$categories->isEmpty())
        <table class="table table-bordered table-striped">
            <tr>
                <th class="text-center">カテゴリー名</th>
                <th class="text-center">登録持物数</th>
                <th class="text-center">操作</th>
            </tr>
            @foreach($categories as $category)
            <tr>
                <td class="text-center">{{ $category->name }}</td>
                <td class="text-center">{{ count($category->articles->where('delete_flag', false))}}</td>
                <td class="text-center">
                    <a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}">変更</a>
                    <form action = "{{ route('categories.destroy', $category->id) }}" method = "POST">
                        @csrf
                        @method('DELETE')
                        <div class="col-12 mb-2 mt-2">
                        <input type = 'submit' value = '削除' class="btn btn-danger" onclick = 'return confirm("削除しますか？")'>
                        </div>
                    </form> 
                </td>
            </tr>
            @endforeach
        </table>
        @else
        <p class="text-center text-danger">現在、登録されているカテゴリーはありません</p>
        @endif
    </div>
</div>
@endsection 

