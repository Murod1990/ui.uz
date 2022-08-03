<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SkautingController extends Controller
{
    public function Hisobot()
    {

//       $db = DB::select('SELECT sekons.ekin_nomi,sekons.aniqlangan_maydon,COUNT(skautings.skauting_maydon),SUM(skautings.skauting_foto) 
  //      FROM sekons LEFT JOIN skautings ON sekons.polya_kodi = skautings.skauting_maydon
    //     GROUP BY sekons.ekin_nomi,sekons.aniqlangan_maydon');
     
    $data = DB::table('sekons')
->leftJoin('skautings','sekons.polya_kodi','=','skautings.skauting_maydon')
->selectRaw("sekons.id, COUNT(skautings.skauting_maydon) AS count, SUM(skautings.skauting_foto) as sum")
->groupBy('sekons.ekin_nomi','sekons.aniqlangan_maydon')
->orderBy('skautings.skauting_foto')->distinct();

        return  $data;
    }
}
