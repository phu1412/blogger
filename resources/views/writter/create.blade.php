@extends('home')

@section('title', 'Thêm mới tác giả')

@section('content')

    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Thêm mới tác giả</h2>
        </div>
        <div class="col-md-12">
            <form method="post" action="{{ route('writter.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="text-primary">Tên tác giả</label>
                    <input type="text" class="form-control" name="name" required>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="text-primary">Ngày sinh</label>
                    <input type="date" class="form-control" name="birthday" required>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="text-primary">Quê quán</label>
                    <input type="text" class="form-control" name="hometown" required>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
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
