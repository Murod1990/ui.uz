<?php

namespace App\Imports;

use App\Models\sekon;
use Maatwebsite\Excel\Concerns\ToModel;

class sezonImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {



        return new sekon([
            'polya_kodi'=> $row[2],
            'Dzz_maydon' => $row[3],
            'aniqlangan_maydon' => $row[4],
            'ekin_nomi' => $row[5],
          
        ]);
    }
}
