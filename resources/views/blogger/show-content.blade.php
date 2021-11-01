@extends('home')

@section('title', 'Thêm mới công viêc')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>{{ $param['name'] }}</h2>
        </div>
        <div class="col-md-12">
            <p> {{ $param['content'] }}</p>

        </div>
        <div class="col-md-12">
            <p> <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Back</button></p>
        </div>
    </div>
    
@endsection
