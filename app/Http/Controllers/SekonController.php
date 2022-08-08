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
    
     $sezon = Excel::import(new sezonImport, $qiymat);
     $skauting= Excel::import(new skautingImport, $skauting);
      
     $request->session()->flash('saqlash','Faylar saqlandi');
  
  
   
    return redirect('/home');
}
       

    }


