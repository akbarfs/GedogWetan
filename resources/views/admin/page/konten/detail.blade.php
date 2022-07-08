@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
      <h4 style="margin:20px;">Detail Konten</h4> <hr>
@endsection

@section('main-content')
  <div class="card-body">
      @csrf
      <table class="table table-bordered">
            <tbody>
              <tr>
                <td width="30%"><strong>Judul Konten</strong></td>
                <td width="70%">{{$DataKonten->judul}}</td>
              </tr>
              <tr>
                <td width="30%"><strong>Tanggal Konten Ditambahkan</strong></td>
                <td width="70%">{{$DataKonten->created_at}}</td>
              </tr>
              <tr>
                <td width="30%"><strong>Tanggal Pengumuman Diedit</strong></td>
                <td width="70%">{{$DataKonten->updated_at}}</td>
              </tr>
              <tr>
                <td width="30%"><strong>Isi Pengumuman</strong></td>
                <td width="70%">{!! $DataKonten->isi !!}</td>
              </tr>
            </tbody>
          </table>
          <a href="{{url('/konten')}}">
            <button class="btn btn-primary">Kembali</button></a>
      </div>
    </div>
  </div>
@endsection