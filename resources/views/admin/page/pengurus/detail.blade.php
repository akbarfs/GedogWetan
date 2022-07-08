@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
      <h4 style="margin:20px;">Detail Pengurus</h4> <hr>
@endsection

@section('main-content')
  <div class="card-body">
      @csrf
      <table class="table table-bordered">
            <tbody>
              <tr>
                <td>
                    <a class="dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown">
                    <strong>Foto</strong>
                    </a>
                  <div class="dropdown-menu">
                    <div class="dropdown-item">
                      <img style="max-width:100%;max-height:100%;" src="{{asset('assets/img/'.$DataPengurus->foto)}}">
                      <br>
                    </div>
                  </div>
              </td>
              <tr>
                <td width="30%"><strong>Nama Lengkap</strong></td>
                <td width="70%">{{$DataPengurus->nama}}</td>
              </tr>
              <tr>
                <td width="30%"><strong>Organisasi</strong></td>
                <td width="70%">{{$DataPengurus->organisasi->organisasi}}</td>
              </tr>
              <tr>
                <td width="30%"><strong>Jabatan</strong></td>
                <td width="70%">{{$DataPengurus->jabatan->jabatan}}</td>
              </tr>
            </tbody>
          </table>
          <a href="{{url('/pengurus')}}">
            <button class="btn btn-primary">Kembali</button></a>
      </div>
    </div>
  </div>
@endsection