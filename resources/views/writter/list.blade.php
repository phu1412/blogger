@extends('home')
@section('title', 'Danh sách tác giả')

@section('content')
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Danh sách tác giả</h2>
        </div>
        <form class="navbar-form navbar-right" method="post" action="{{ route('writter.search') }}">
            @csrf
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" name="keyword">
                    </div>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-warning">Tìm kiếm</button>
                </div>
            </div>
        </form>
        <div class="col-12">
            @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    {{ Session::get('success') }}
                </p>
            @endif
        </div>
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên tác giả</th>
                        <th scope="col">Ngày sinh</th>
                        <th scope="col">Quê quán</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($writters as $key => $writter)
                        <tr>
                            <th scope="col">{{ ++$key }}</th>
                            <td>{{ $writter->name }}</td>
                            <td>{{ $writter->birthday }}</td>
                            <td>{{ $writter->hometown }}</td>
                            <td><a href="{{ route('writter.edit', $writter->id) }}" class="btn btn-primary">Sửa</a>
                                <a href="{{ route('writter.destroy', $writter->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa ko ?')">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-6"><a href="{{ route('writter.create') }}" class="btn btn-primary">Thêm mới</a>
                    <a href="{{ route('blogger.index') }}" class="btn btn-secondary">Xem blog</a>
                </div>
                <div class="col-6" style="text-align:right">{{ $writters->links() }}</div>
            </div>
        </div>
    </div>

@endsection
