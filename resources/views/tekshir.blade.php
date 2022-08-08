@extends('layouts.app')
@section('title')
Hisobot
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-sm-8">

        <h1 >Skauting hisobot tayyor</h1>
  <table id="example" class=" table table-bordered border-primary" style="width:100%">
        <thead class="table-dark">
            <tr>
                <th >Ekin nomi</th>
                <th>Aniqlangan maydon</th>
                <th>Maydon kodi</th>
                <th>Skauting soni</th>
                <th>Jami skauting</th>
               
            </tr>
        </thead>
        <tbody>
        @foreach($data as $dbhisobot)
            <tr>
           
            <td>{{$dbhisobot->ekin_nomi}}</td>
            <td>{{$dbhisobot->aniqlangan_maydon}}</td>
            <td>{{$dbhisobot->polya_kodi}}</td>
            <td>{{(isset($dbhisobot->count)) ? $dbhisobot->count : 0 }}</td>
            <td>{{(isset($dbhisobot->sum)) ? $dbhisobot->sum : 0}}</td>
          
            </tr>
            @endforeach
        </tbody>
</table>


        </div>
    </div>
</div>



@endsection
