<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class HisobotExportData implements WithHeadings, FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'Ekin turi',
            'aniqlangan_maydon',
            'polya_kodi',
            'skauting soni',
            'jami',
        ];
    }

    public function collection()
    {
        return DB::table('sekons')
            ->distinct('sekons.polya_kodi')
            ->leftJoin(
                'skautings',
                'sekons.polya_kodi',
                '=',
                'skautings.skauting_maydon'
            )
            ->selectRaw(
                'sekons.ekin_nomi,sekons.aniqlangan_maydon,sekons.polya_kodi, COUNT(skautings.skauting_maydon) AS count, SUM(skautings.skauting_foto) as sum'
            )
            ->groupBy('sekons.ekin_nomi', 'sekons.aniqlangan_maydon')
            ->get();
    }
}
