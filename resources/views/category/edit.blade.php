@extends('home')

@section('title', 'Chỉnh sửa thể loại')

@section('content')

    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Chỉnh sửa thể loại</h2>
        </div>
        <div class="col-md-12">
            <form method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="text-primary">Tên</label>
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
@endsection
