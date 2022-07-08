@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
      <h4 style="margin:20px;">Formulir Edit Konten</h4> <hr>
@endsection

@section('main-content')
  <div class="card-body">
    <form method="post" action="{{url('/konten.'.$DataKonten->id_konten)}}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" value="put" name="_method">
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" id="judul" value="{{ $DataKonten->judul }}" >
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
              rows="12">{{$DataKonten->isi}}</textarea>
              </div>
              @error('isi')
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