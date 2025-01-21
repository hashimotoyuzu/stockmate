@extends('layouts.common')
@section('content')
<div class="container">
    <div class="row justify-content-center mb-2">
        <h1 class="text-center text-primary">持物更新画面</h1>
    </div> 
    <div class="row container">
        <form action="{{ route('categories.update',$article->id }}" method="POST">
            @csrfs
            <div class="form-check-inline mb-1">
                @foreach($categories as $category)
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="category_id" id="category{{ $category->id }}" value="{{ $category->id }}">
                    <label class="form-check-label" for="category{{ $category->id }}">
                    {{ $category->name }}
                    </label>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12 mb-2 mt-2">
                    <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="名前">
                    </div>
                </div>
                <div class="col-12 mb-2 mt-2">
                    <div class="form-group">
                        <input type="date" name="expiration_date" class="form-control" placeholder="使用期限">
                    </div>
                </div>
                <div class="col-12 mb-2 mt-2">
                    <div class="form-group">
                        <input type="text" name="stock" class="form-control" placeholder="ストック">
                    </div>
                </div>
                <div class="col-12 mb-2 mt-2">
                    <div class="form-group">
                        <input type="text" name="memo" class="form-control" placeholder="メモ">
                    </div>
                </div>
                <div class="col-12 mb-2 mt-2">
                    <button type="submit" class="btn btn-primary w-100">変更</button>
                </div>
            </div> 
        </form>
    </div>
</div>
@endsection 
