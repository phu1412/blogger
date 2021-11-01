<?php

namespace App\Repositories\Eloquents;

use App\Models\Writter;
use App\Repositories\Interfaces\WritterInterface;

class WritterRepository implements WritterInterface
{
    public function all()
    {
        $items = Writter::orderBy('date_write', 'ASC')->paginate(5);
        return $items;
    }

    public function find($id)
    {
        $item = Writter::findOrFail($id);
        return $item;
    }

    public function store($request)
    {
        $items = new Writter();
        $items->name = $request->input('name');
        $items->birthday = $request->input('birthday');
        $items->hometown = $request->input('hometown');
        $items->save();

        return $items;
    }

    public function update($request, $id)
    {
        $items = Writter::findOrFail($id);
        $items->name = $request->input('name');
        $items->birthday = $request->input('birthday');
        $items->hometown = $request->input('hometown');
        $items->save();
        return $items;
    }

    public function destroy($id)
    {
        $item = Writter::findOrFail($id);
        $item->blogger()->delete();
        $item->delete();
        return $item;
    }

    public function search($request)
    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('Writter.list');
        }
        $items = Writter::where('name', 'LIKE', '%' . $keyword . '%')->orwhere('hometown', 'LIKE', '%' . $keyword . '%')->orwhere('birthday', 'LIKE', '%' . $keyword . '%')->paginate(5);
        return $items;
    }
}
