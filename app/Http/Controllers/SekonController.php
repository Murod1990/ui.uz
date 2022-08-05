<?php

namespace App\Http\Controllers;
use App\Imports\sezonImport;
use App\Imports\skautingImport;
use App\Models\skauting;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class SekonController extends Controller
{
    public function import(Request $request) 
    {
        $this -> validate($request,[
       'sezon' => 'required| mimes:xls,xlsx',
       'skauting' => 'required| mimes:xls,xlsx',
        ]);

    $qiymat = $request->file('sezon');
    $skauting = $request->file('skauting');

    Excel::import(new sezonImport, $qiymat);
    Excel::import(new skautingImport, $skauting);
    $request->session()->flash('saqlash','Faylar saqlandi');
    return redirect('/home');
}
       

    }

    /*public function import_skauting(Request $request)
{
    $this->validate($request,[
        'skauting' => 'required| mimes:xls,xlsx',
    ]);
    $skauting = $request->file('skauting');
    Excel::import(new skautingImport, $skauting);
      
   return redirect('/home')->with('success', ' Skauting Fayl yuklandi!');
}
*/

