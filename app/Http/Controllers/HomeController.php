<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Exports\HisobotExportData;
use Maatwebsite\Excel\Facades\Excel;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        return view('home');
    }
    
    public function export() 
    {
        
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportsk()
    {
        
        return Excel::download( new HisobotExportData(),' Hisobot_qurish.xlsx');
    }
  
}
