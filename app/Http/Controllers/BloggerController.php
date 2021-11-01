<?php

namespace App\Http\Controllers;

use App\Http\Requests\BloggerRequest;
use App\Repositories\Eloquents\BloggerRepository;
use App\Repositories\Eloquents\CategoryRepository;
use App\Repositories\Eloquents\WritterRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BloggerController extends Controller
{
    private $bloggerRepository;
    private $categoryRepository;
    private $writterRepository;
    public function __construct(BloggerRepository $bloggerRepository, CategoryRepository $categoryRepository, WritterRepository $writterRepository)
    {
        $this->bloggerRepository = $bloggerRepository;
        $this->categoryRepository = $categoryRepository;
        $this->writterRepository = $writterRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = $this->bloggerRepository->all();

        $param = [
            'blogs' => $blogs
        ];
        return view('blogger.list', $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->all();
        $writters = $this->writterRepository->all();

        $param = [
            'categories' => $categories,
            'writters' => $writters
        ];
        return view('blogger.create', $param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BloggerRequest $request)
    {
        $this->bloggerRepository->store($request);

        Session::flash('success', 'Tạo mới thành công');
        return redirect()->route('blogger.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = $this->bloggerRepository->find($id);
        $param = [
            'name' => $blog->name,
            'content' => $blog->content
        ];
        return view('blogger.show-content', $param);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = $this->bloggerRepository->find($id);
        $categories = $this->categoryRepository->all();
        $writters = $this->writterRepository->all();

        $param = [
            'blog' => $blog,
            'categories' => $categories,
            'writters' => $writters
        ];
        return view('blogger.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->bloggerRepository->update($request, $id);

        Session::flash('success', 'Cập nhật thành công');
        return redirect()->route('blogger.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = $this->bloggerRepository->find($id);
        $blog->delete();

        Session::flash('success', 'Xóa thành công');
        return redirect()->route('blogger.index');
    }

    public function search(Request $request)
    {
        $blogs = $this->bloggerRepository->search($request);

        $param = [
            'Blogs' => $blogs
        ];
        return view('blogger.list', $param);
    }
}
