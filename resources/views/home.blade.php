@extends('layouts.app')
@section('title')
    Hisobot
@endsection
{{-- @include ('partials.messages') --}}
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
           
                    @if (session()->has('saqlash'))
                       <script>
                        Swal.fire({
                            title: '{{ session('saqlash')}}',
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                            })
                        
                       </script>
                           
                        
                    @endif

            <div class="col-sm-6">
                <div class="card-header">
                    <small id="helpId" class="text-muted">Sezon hisobotni yuklang qabul qilish fayl turi  .xlsx .xls 
                        yuklang</small>
                </div>
                <div class="form-group">
                    <form action="/sezon/yukla" method="post" id="form" data-parsley-validate ='' enctype="multipart/form-data">
                        @csrf

                        <input type="file" name="sezon" class="form-control" placeholder="sezon faylni yukalash" required="" data-parsley-max-file-size="1500"
                            aria-describedby="helpId">
                         
                       </div>
                
              </div>
            <div class="col-sm-6">
                <div class="card-header">
                     <small id="helpId" class="text-muted">Skauting hisobotni yuklash qabul qilish fayl turi .xlsx .xls yuklang</small>
                </div>
                <div class="form-group">
                    <input type="file" name="skauting" class="form-control" placeholder="" required="" data-parsley-max-file-size="1500" aria-describedby="helpId">
                    <small id="helpId" class="text-muted"></small>
                </div>
                
            </div>
    
            <button type="submit" class="btn btn-primary p-2 mt-2"> Yuklash</button>

                    </form>
           
            {{-- <a href="/tekshir" type="button" class="btn btn-success mt-2"> Hisobot qurish</a> --}}

        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="/tekshir" type="button" class="btn btn-lg btn-success mt-2 d-grid gap-2 col-3 mx-auto"> Hisobot</a>
            </div>
            <div class="col-md-6">
                <a href="{{ route('clear') }}" type="button" class="btn btn-lg btn-danger mt-2 d-grid gap-2 col-3 mx-auto">
                    Tozalash</a>
            </div>
        </div>
        <hr />
        <div class="row justify-content-center">
            <div class="col-md-12">



               

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
