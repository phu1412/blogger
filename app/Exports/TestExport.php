<?php

namespace App\Exports;

use App\Models\Blogger;
use Maatwebsite\Excel\Concerns\FromCollection;

class TestExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Blogger::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
        ];
    }
    public function map($bill): array
    {
        return [
            Blogger::all()->id,
            Blogger::all()->name,
        ];
    }
}
