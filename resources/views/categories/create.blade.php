@extends('layouts.common')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size:1rem;">商品登録画面</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" herf="{{ url('/categories')}}">戻る</a>
        </div>   
    </div>
</div>

<div style="text-align:right;">
<form action="{{ route('categories.create')}}"metfod="POST">
    @csrf

    <div class="row">
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="名前">
            </div>
        </div>
        <div class="col-12 mb-2 mt-2">
            <div class="form-group">
                <input type="text" name="expiration" class="form-control" placeholder="使用期限">
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
                <button type="submit" class="btn btn-primary w-100">登録</button>
        </div>
    </div> 
</form>
</div>
@endsection 

