@extends('home')

@section('title', 'Chỉnh sửa tác giả')

@section('content')

    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Chỉnh sửa tác giả</h2>
        </div>
        <div class="col-md-12">
            <form method="post" action="{{ route('writter.update', $writter->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="text-primary">Tên</label>
                    <input type="text" class="form-control" name="name" value="{{ $writter->name }}" required>
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
                    <input type="date" class="form-control" name="birthday" value="{{ $writter->birthday }}" required>
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
                    <input type="text" class="form-control" name="hometown" value="{{ $writter->hometown }}" required>
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
                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
@endsection
