@extends('layouts.apps')
@section('main-content')
<section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">
<hr>
<a href="{{url('/#berita')}}">Beranda</a>/ Detail Berita <hr>
  <h1 style="font-weight:bold;">
    <center>
      {{$DataBerita->judul}}
    </center>
  </h1>
  <br>
  <img src="{{asset('assets/img/'.$DataBerita->gambar)}}" style="object-fit: cover;width:100%;height: 250px;">
    <hr>
    <center>
    Kategori : {{$DataBerita->kategori->kategori}} | Penulis : {{$DataBerita->penulis->penulis}}<br>
    Tag : @foreach($DataBerita->tag as $tag)
    {{$tag->tag}}
    @endforeach
    <br>
    tanggal : {{$DataBerita->updated_at}}
    </center>
    <br>
    <p style="margin:10px;">
      {!! $DataBerita->isi !!}
    </p>
    <br>
</section>
</div>
@endsection