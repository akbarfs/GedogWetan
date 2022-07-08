@extends('layouts.apps')
@section('main-content')
<section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">
<hr>
<a href="{{url('/#pengumuman')}}">Beranda</a>/ Detail Pengumuman <hr>
  <h1 style="font-weight:bold;">
    <center>
      {{$DataPengumuman->judul}}
    </center>
  </h1>
  <br>
  <img src="{{asset('admin/assets/img/'.$DataPengumuman->gambar)}}" style="object-fit: cover;width:100%;height: 250px;">
    <hr>
    <center>
    tanggal : {{$DataPengumuman->updated_at}}
    </center>
    <br>
    <p style="margin:10px;">
      {!! $DataPengumuman->isi !!}
    </p>
@endsection