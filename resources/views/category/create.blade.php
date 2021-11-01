@extends('home')

@section('title', 'Thêm mới thể loại')

@section('content')

    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Thêm mới thể loại</h2>
        </div>
        <div class="col-md-12">
            <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="text-primary">Tên</label>
                    <input type="text" class="form-control" name="name">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                             {{ $errors->default->first('name') }}
                            </ul>
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
@endsection
