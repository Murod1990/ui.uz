<?php

namespace App\Imports;

use App\Models\skauting;
use Maatwebsite\Excel\Concerns\ToModel;

class skautingImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new skauting([
            'skauting_maydon'=> $row[5],
            'skauting_foydalanuvchi' => $row[8],
            'skauting_lavozim' => $row[9],
            'skauting_foto' => $row[10],
        ]);
    }
}
