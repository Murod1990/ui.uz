<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
class UsersExport implements FromCollection,WithCustomStartCell,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::where('name','murod')->get();
    }
    public function startCell(): string
    {
        return 'B2';
    }
    public function headings(): array
    {
        return [
            'T/r',
            'Foydalanuvchi',
            'vaqt',
        ];
    }
}
