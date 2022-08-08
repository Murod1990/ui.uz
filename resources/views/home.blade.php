@extends('layouts.app')
@section('title')
    Hisobot
@endsection

@section('content')
    <div class="container">
        <div class="row shadow-lg p-3 mb-3 mt-5 bg-white rounded">
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
                   

                   
            <div class="col-sm-6 shadow-lg p-3 mb-3 mt-3   bg-white rounded">
                <div class="card-header mb-2">
                    <small  class="text-muted">Sezon hisobotni yuklang qabul qilish fayl turi <samp>.xlsx .xls</samp>  
                        yuklang</small>
                </div>
                <div class="form-group">
                    <form action="/sezon/yukla" method="post" id="form" data-parsley-validate ='' enctype="multipart/form-data">
                        @csrf

                        <input type="file" name="sezon" class="form-control" placeholder="sezon faylni yukalash" required="" data-parsley-max-file-size="1500"
                            aria-describedby="helpId">
                         
                       </div>
                
              </div>
            <div class="col-sm-6 shadow-lg p-3 mb-3 mt-3  bg-white rounded">
                <div class="card-header mb-2">
                     <small id="helpId" class="text-muted">Skauting hisobotni yuklash qabul qilish fayl turi <samp>.xlsx .xls</samp>  yuklang</small>
                </div>
                <div class="form-group">
                    <input type="file" name="skauting" class="form-control"  required="" data-parsley-max-file-size="1500" aria-describedby="helpId">
                    <small id="helpId" class="text-muted"></small>
                </div>
                
            </div>
    <div class="row justify-content-center">
        <div class="col-md-4 ">
        <button type="submit" class="btn btn-lg btn-primary  mt-3 mx-auto"> Yuklash</button>
        </div>
                    </form>
              <div class="col-md-4">
                <a href="/tekshir" type="button" class="btn btn-lg btn-success mt-3 mx-auto"> Hisobot</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('clear') }}" type="button" class="btn btn-lg btn-danger mt-3 mx-auto">
                    Tozalash</a>
            </div>
       
    </div>
        

        </div>
        <div class="row">
            
        </div>
       
        <div class="row justify-content-center">
            <div class="col-md-12">



               

               

            </div>
        </div>
    </div>
@endsection
