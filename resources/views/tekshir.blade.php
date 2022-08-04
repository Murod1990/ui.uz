@extends('layouts.app')
@section('title')
Hisobot
@endsection

@section('content')
{{-- @include('partials.messages') --}}
<h1 >Hammaga salom yaxshimisizlar nima gaplar</h1>


<table id="example" class="order-column" style="width:100%">
        <thead>
            <tr>
                <th>ekin_nomi</th>
                <th>aniqlangan_maydon</th>
                <th>polya_kodi</th>
                <th>count</th>
                <th>sum</th>
               
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


@endsection
