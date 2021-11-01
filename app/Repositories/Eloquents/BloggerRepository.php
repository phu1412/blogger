<?php

namespace App\Repositories\Eloquents;

use App\Models\Blogger;
use App\Repositories\Interfaces\BloggerInterface;


class BloggerRepository implements BloggerInterface
{
    public function all()
    {
        $items = Blogger::orderBy('date_write', 'ASC')->paginate(5);
        return $items;
    }

    public function find($id){
        $item = Blogger::findOrFail($id);
        return $item;
    }

    public function store($request)
    {
        $item = new Blogger();
        $item->category_id = $request->input('category_id');
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->content = $request->input('content');
        $item->writter_id = $request->input('writter_id');
        $item->date_write = $request->input('date_write');

        $item->save();

        return $item;
    }

    public function update($request, $id)
    {
        $item = Blogger::findOrFail($id);
        $item->category_id = $request->input('category_id');
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->content = $request->input('content');
        $item->writter_id = $request->input('writter_id');
        $item->date_write = $request->input('date_write');

        $item->save();
        return $item;
    }

    public function destroy($id){
        $item = Blogger::findOrFail($id);
        $item->delete();
        return $item;
    }

    public function search($request){
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('blogger.list');
        }
        $items = Blogger::where('name', 'LIKE', '%' . $keyword . '%')->orwhere('description', 'LIKE', '%' . $keyword . '%')->orwhere('date_write', 'LIKE', '%' . $keyword . '%')->orwhere('writter', 'LIKE', '%' . $keyword . '%')->orwhere('category', 'LIKE', '%' . $keyword . '%')->paginate(5);
        return $items;
    }
}
