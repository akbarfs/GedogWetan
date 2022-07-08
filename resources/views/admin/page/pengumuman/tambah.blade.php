@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
      <h4 style="margin:20px;">Formulir Tambah Pengumuman</h4> <hr>
@endsection

@section('main-content')
  <div class="card-body">
    <form method="post" action="{{url('/pengumuman')}}" enctype="multipart/form-data">
      @csrf
      <div class="row">
            <div class="col-md-6 pr-2">
                <input type="file" name="gambar" id="customfile">
              @error('gambar')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div><br>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul" >
              </div>
              @error('judul')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Isi</label>
                <textarea class="form-control @error('isi') 
              is-invalid @enderror" name="isi" id="editor1" 
              rows="12"></textarea>
              </div>
              @error('isi')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div>

            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection