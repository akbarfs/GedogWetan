@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
      <h4 style="margin:20px;">Detail Potensi</h4> <hr>
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
                      <img style="max-width:100%;max-height:100%;" src="{{asset('assets/img/'.$DataPotensi->gambar)}}">
                      <br>
                    </div>
                  </div>
                </td>
              <tr>
              <tr>
                <td width="30%"><strong>Potensi</strong></td>
                <td width="70%">{{$DataPotensi->potensi}}</td>
              </tr>
              <tr>
                <td width="30%"><strong>deskripsi</strong></td>
                <td width="70%">{!! $DataPotensi->deskripsi!!}</td>
              </tr>
            </tbody>
          </table>
          <a href="{{url('/potensi')}}">
            <button class="btn btn-primary">Kembali</button></a>
      </div>
    </div>
  </div>
@endsection