@extends('layouts.common')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-2">
        <h1 class="text-center text-primary">新規カテゴリーの追加</h1>
    </div> 
    <div class="row container">
        <form action="{{ route('categories.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 mb-2 mt-2">
                    <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="名前">
                    </div>
                </div>
                <div class="col-12 mb-2 mt-2">
                    <button type="submit" class="btn btn-primary w-100">保存</button>
                </div>
            </div> 
        </form>
    </div>
</div>
@endsection 

