@extends('home')
@section('title', 'Danh sách bài viết')

@section('content')
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Danh sách bài viết</h2>
        </div>
        <form class="navbar-form navbar-right" method="post" action="{{ route('blogger.search') }}">
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
                        <th scope="col"><a href="{{ route('category.index') }}" class="text-decoration-none text-dark">Thể
                                loại</a></th>
                        <th scope="col">Tên</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col"><a href="{{ route('writter.index') }}" class="text-decoration-none text-dark">Tác
                                giả</a></th>
                        <th scope="col">Ngày viết</th>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $key => $blog)
                        <tr>
                            <th scope="col">{{ ++$key }}</th>
                            <td>{{ $blog->category->name }}</td>
                            <td>{{ $blog->name }}</td>
                            <td>{{ $blog->description }}</td>
                            <td>{{ $blog->writter->name }}</td>
                            <td>{{ $blog->date_write }}</td>
                            <td><a href="{{ route('blogger.show', $blog->id) }}" class="btn btn-success">Xem</a></td>
                            <td><a href="{{ route('blogger.edit', $blog->id) }}" class="btn btn-primary">Sửa</a>
                                <a href="{{ route('blogger.destroy', $blog->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa ko ?')">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-6"><a href="{{ route('blogger.create') }}" class="btn btn-primary">Thêm mới</a>
                </div>
                <div class="col-6" style="text-align:right">{{ $blogs->links() }}</div>
            </div>
        </div>
    </div>

@endsection
