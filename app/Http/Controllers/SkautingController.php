<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\HisobotExportData;
use Maatwebsite\Excel\Facades\Excel;
use App\Components\FlashMessages;
use Illuminate\Support\Facades\Session;
use App\Models\sekon;
use App\Models\skauting;

class SkautingController extends Controller
{
    use FlashMessages;

    public function Hisobot(Request $request)
    {
        if (sekon::query()->count() > 0 && skauting::query()->count() > 0) {
            
            // return Excel::download( new HisobotExportData(),' Hisobot_qurish.xlsx');
            $data = DB::table('sekons')
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
                ->groupBy('sekons.ekin_nomi', 'sekons.aniqlangan_maydon','sekons.polya_kodi')
                ->get();
                // dd($data);
                // Session::flash('message', 'Muvaffaqiyatli eksport qilindi!');
                // Session::flash('alert-success', 'success');
                return view('tekshir',['data'=> $data]);
        } else {
            Session::flash('message', 'Hech qanday ma`lumot topilmadi');
            Session::flash('alert-info', 'info');
            return \Redirect::back()->withSuccess(
                'Jadval ma\'lumotlari tozalanadi.'
            );
        }
    }

    public function clear(Request $request)
    {
        sekon::query()->truncate();
        skauting::query()->truncate();
        Session::flash('message', 'Jadval ma\'lumotlari tozalanadi.');
        Session::flash('alert-warning', 'success');
        return \Redirect::back()->withSuccess(
            'Jadval ma\'lumotlari tozalanadi.'
        );
    }
}
