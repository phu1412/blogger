@extends('home')

@section('title', 'Chỉnh sửa bài viết')

@section('content')

    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Chỉnh sửa bài viết</h2>
        </div>
        <div class="col-md-12">
            <form method="post" action="{{ route('blogger.update', $blog->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="text-primary">Thể loại</label>
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="text-primary">Tên</label>
                    <input type="text" class="form-control" name="name" value="{{ $blog->name }}" required>
                </div>
                <div class="form-group">
                    <label for="description" class="text-primary">Mô tả</label>
                    <input type="text" name="description" class="form-control" value="{{ $blog->description }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="content" class="text-primary">Nội dung</label>
                    <textarea class="form-control" rows="3" name="content" required>{{ $blog->content }}</textarea>
                </div>
                <div class="form-group">
                    <label class="text-primary">Tác giả</label>
                    <select class="form-control" name="writter_id">
                        @foreach ($writters as $writter)
                            <option value="{{ $writter->id }}">{{ $writter->name . ', ' . $writter->birthday }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="date_write" color="blue">Ngày viết</label>
                    <input type="date" name="date_write" class="form-control" value="{{ $blog->date_write }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
@endsection
