@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
      <h4 style="margin:20px;">Formulir Edit Kontak</h4> <hr>
@endsection

@section('main-content')
  <div class="card-body">
    <form method="post" action="{{url('/kontak.'.$DataKontak->id_kontak)}}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" value="PUT" name="_method">
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" id="judul" value="{{$DataKontak->judul}}" >
              </div>
              @error('judul')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Kontak</label>
                <input type="text" class="form-control" name="kontak" id="kontak" value="{{$DataKontak->kontak}}" >
              </div>
              @error('kontak')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection