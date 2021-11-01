<?php

namespace App\Repositories\Eloquents;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryInterface;


class CategoryRepository implements CategoryInterface
{
    public function all()
    {
        $items = Category::orderBy('date_write', 'ASC')->paginate(5);
        return $items;
    }

    public function find($id)
    {
        $item = Category::findOrFail($id);
        return $item;
    }

    public function store($request)
    {
        $item = new Category();
        $item->name = $request->input('name');
        $item->save();

        return $item;
    }

    public function update($request, $id)
    {
        $item = Category::findOrFail($id); 
        $item->name = $request->input('name');
        $item->save();
        return $item;
    }

    public function destroy($id)
    {
        $item = Category::findOrFail($id);
        $item->blogger()->delete();
        $item->delete();
        return $item;
    }

    public function search($request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('Category.list');
        }
        $items = Category::where('name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        return $items;
    }
}
