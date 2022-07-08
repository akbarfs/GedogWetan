@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
      <h4 style="margin:20px;">Detail Slider</h4> <hr>
@endsection

@section('main-content')
  <div class="card-body">
      @csrf
      <table class="table table-bordered">
            <tbody>
              <tr>
                <td>
                    <a class="dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown">
                    <strong>Gambar</strong>
                    </a>
                  <div class="dropdown-menu">
                    <div class="dropdown-item">
                      <img style="max-width:100%;max-height:100%;" src="{{asset('assets/img/'.$DataSlide->gambar)}}">
                      <br>
                    </div>
                  </div>
</td>
              <tr>
                <td width="30%"><strong>Judul</strong></td>
                <td width="70%">{{$DataSlide->judul}}</td>
              </tr>

            </tbody>
          </table>
          <a href="{{url('/slide')}}">
            <button class="btn btn-primary">Kembali</button></a>
      </div>
    </div>
  </div>
@endsection