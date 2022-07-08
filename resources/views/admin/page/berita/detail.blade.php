@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
      <h4 style="margin:20px;">Detail Berita</h4> <hr>
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
                      <img style="max-width:100%;max-height:100%;" src="{{asset('assets/img/'.$DataBerita->gambar)}}">
                      <br>
                    </div>
                  </div>
</td>
              <tr>
              <tr>
                <td width="30%"><strong>Kategori Berita</strong></td>
                <td width="70%">{{$DataBerita->kategori->kategori}}</td>
              </tr>
              <tr>
                <td width="30%"><strong>Judul Berita</strong></td>
                <td width="70%">{{$DataBerita->judul}}</td>
              </tr>
              <tr>
                <td width="30%"><strong>Penulis</strong></td>
                <td width="70%">{{$DataBerita->penulis->penulis}}</td>
              </tr>
              <tr>
                <td width="30%"><strong>Isi Berita</strong></td>
                <td width="70%">{!! $DataBerita->isi !!}
                </td>
              </tr>
              <tr>
                <td width="30%"><strong>Tag Berita</strong></td>
                <td width="70%">
                  <ul>
                    @foreach($DataBerita->tag as $tag)
                    <li>{{$tag->tag}}</li>
                    @endforeach
                  </ul>
                </td>
              </tr>
            </tbody>
          </table>
          <a href="{{url('/berita')}}">
            <button class="btn btn-primary">Kembali</button></a>
      </div>
    </div>
  </div>
@endsection