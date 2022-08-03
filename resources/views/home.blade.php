@extends('layouts.app')
@section('title')
    Hisobot qurish
@endsection
@include ('partials.messages')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card-body">
                <div class="flash-message" id="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if (Session::has('alert-' . $msg))
                            <p class="alert alert-{{ $msg }}">{{ Session::get('message') }}</p>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card-header">
                    <small id="helpId" class="text-muted">sezon hisobotni yuklang qabul qilish .xlsx .xls fayl
                        yuklang</small>
                </div>
                <div class="form-group">
                    <form action="/sezon/yukla" method="post" enctype="multipart/form-data">
                        @csrf

                        <input type="file" name="sezon" class="form-control" placeholder="sezon faylni yukalash"
                            aria-describedby="helpId">
                        <small id="helpId" class="text-muted"></small>

                        <button type="submit" class="btn btn-primary p-2 mt-2"> yuklamoq</button>

                    </form>

                </div>
            </div>
            <div class="col-sm-6">
                <div class="card-header">
                    <small id="helpId" class="text-muted">Skauting hisobotni yuklang qabul qilish .xlsx .xls fayl
                        yuklang</small>
                </div>
                <div class="form-group">

                    <form action="/skauting/yukla" method="post" enctype="multipart/form-data">
                        @csrf


                        <input type="file" name="skauting" class="form-control" placeholder="" aria-describedby="helpId">


                        <button type="submit" class="btn btn-primary p-2 mt-2"> yuklamoq</button>

                    </form>

                </div>
            </div>

            {{-- <a href="/tekshir" type="button" class="btn btn-success mt-2"> Hisobot qurish</a> --}}

        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="/tekshir" type="button" class="btn btn-lg btn-success mt-2 d-grid gap-2 col-3 mx-auto"> Hisobot
                    qurish</a>
            </div>
            <div class="col-md-12">
                <a href="{{ route('clear') }}" type="button" class="btn btn-lg btn-danger mt-2 d-grid gap-2 col-3 mx-auto">
                    Toza</a>
            </div>
        </div>
        <hr />
        <div class="row justify-content-center">
            <div class="col-md-12">



                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>

                <table id="example" class="order-column" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>email</th>
                            <th>email_verified_at</th>
                            <th>created_at</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($date as $user)
                            <tr>

                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->email_verified_at }}</td>
                                <td>{{ $user->created_at }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
