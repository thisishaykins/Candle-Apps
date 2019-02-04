<?php

namespace App\Imports;

use App\DND;
use Maatwebsite\Excel\Concerns\ToModel;

class DNDImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DND([

            'network_id'     => '1',
            'status_id'      => '1', 
            'phone_number'   => $row[0],
            'is_active'      => true,

        ]);
    }
}
