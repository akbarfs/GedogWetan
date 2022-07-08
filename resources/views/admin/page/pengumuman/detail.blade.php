@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
      <h4 style="margin:20px;">Detail Data Pengumuman</h4> <hr>
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
                      <img style="max-width:100%;max-height:100%;" src="{{asset('public/admin/assets/img/'.$DataPengumuman->gambar)}}">
                      <br>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td width="30%"><strong>Judul Pengumuman</strong></td>
                <td width="70%">{{$DataPengumuman->judul}}</td>
              </tr>
              <tr>
                <td width="30%"><strong>Tanggal Pengumuman Ditambahkan</strong></td>
                <td width="70%">{{$DataPengumuman->created_at}}</td>
              </tr>
              <tr>
                <td width="30%"><strong>Tanggal Pengumuman Diedit</strong></td>
                <td width="70%">{{$DataPengumuman->updated_at}}</td>
              </tr>
              <tr>
                <td width="30%"><strong>Isi Pengumuman</strong></td>
                <td width="70%">{!! $DataPengumuman->isi !!}</td>
              </tr>
            </tbody>
          </table>
          <a href="{{url('/pengumuman')}}">
            <button class="btn btn-primary">Kembali</button></a>
      </div>
    </div>
  </div>
@endsection