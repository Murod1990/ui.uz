@extends('layouts.app')
@section('title')
Hammasi yaxshi
@endsection

@section('content')

<h1 >Hammaga salom yaxshimisizlar nima gaplar</h1>


<table id="example" class="order-column" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>maydon</th>
                <th>cout</th>
                <th>created_at</th>
               
            </tr>
        </thead>
        <tbody>
        @foreach($data as $dbhisobot)
            <tr>
           
            <td>{{$dbhisobot->ekin_nomi}}</td>
            <td>{{$dbhisobot->aniqlangan_maydon}}</td>
            <td>{{$dbhisobot->skauting_maydon}}</td>
            <td>{{$dbhisobot->skauting_foto}}</td>
          
            </tr>
            @endforeach
        </tbody>
</table>


@endsection
