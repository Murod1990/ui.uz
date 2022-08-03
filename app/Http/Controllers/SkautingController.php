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
            Session::flash('message', 'Muvaffaqiyatli eksport qilindi!');
            Session::flash('alert-success', 'success');
            return Excel::download(
                new HisobotExportData(),
                ' Hisobot_qurish.xlsx'
            );
        } else {
            Session::flash('message', 'Hech qanday maʼlumot topilmadi');
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
        Session::flash('alert-success', 'success');
        return \Redirect::back()->withSuccess(
            'Jadval ma\'lumotlari tozalanadi.'
        );
    }
}
