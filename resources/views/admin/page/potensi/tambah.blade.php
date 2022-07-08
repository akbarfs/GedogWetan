@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
      <h4 style="margin:20px;">Formulir Tambah Potensi</h4> <hr>
@endsection

@section('main-content')
  <div class="card-body">
    <form method="post" action="{{url('/potensi')}}" enctype="multipart/form-data">
      @csrf
      <div class="row">
            <div class="col-md-6 pr-2">
                <label for="">Gambar</label><br>
                <input type="file" name="gambar" id="customfile">
              @error('gambar')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div><br>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Potensi</label>
                <input type="text" class="form-control" name="potensi" id="potensi" placeholder="Masukkan potensi desa" >
              </div>
              @error('potensi')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>deskripsi</label>
                <textarea class="form-control @error('deskripsi') 
              is-invalid @enderror" name="deskripsi" id="editor1" 
              rows="12"></textarea>
              </div>
              @error('deskripsi')
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