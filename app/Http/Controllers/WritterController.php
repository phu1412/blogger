<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Repositories\Eloquents\WritterRepository;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WritterController extends Controller
{
    public function __construct(WritterRepository $writterRepository)
    {
        $this->writterRepository = $writterRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $writters = $this->writterRepository->all();
        $param = [
            'writters' => $writters
        ];
        return view('writter.list', $param);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('writter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $this->writterRepository->store($request);

        Session::flash('success', 'Tạo mới thành công');
        return redirect()->route('writter.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $writter = $this->writterRepository->find($id);
        $param = [
            'writter' => $writter
        ];
        return view('writter.edit', $param);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->writterRepository->update($request, $id);

        Session::flash('success', 'Chỉnh sửa thành công');
        return redirect()->route('writter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->writterRepository->delete($id);
        Session::flash('success', 'Xóa tác giả thành công');
        return redirect()->route('writter.index');
    }
    public function search(Request $request)
    {
        $writters = $this->writterRepository->search($request);
        $param = [
            'writters' => $writters
        ];
        return view('writter.list', $param);
    }
}
