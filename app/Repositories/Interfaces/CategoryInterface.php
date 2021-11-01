<?php

namespace App\Repositories\Interfaces;

interface CategoryInterface
{
    public function all();
    public function store($request);
    public function update($request, $id);
    public function find($id);
    public function destroy($id);
    public function search($request);
}
