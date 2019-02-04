<?php

namespace App\Exports;

use App\DND;
use Maatwebsite\Excel\Concerns\FromCollection;

class DNDExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DND::all();
    }
}
