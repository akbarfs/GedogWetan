@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
      <h4 style="margin:20px;">Formulir Edit Pengumuman</h4> <hr>
@endsection

@section('main-content')
  <div class="card-body">
    <form method="post" action="{{url('/pengumuman.'.$DataPengumuman->id_pengumuman)}}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" value="put" name="_method">
      <div class="row">
            <div class="col-md-6 pr-2">
                <input type="file" name="gambar" id="customfile"><br>
                <span class="text-danger" style="font-weight:lighter;font-size:12px">*Jika foto tidak ingin dirubah maka anda tidak perlu mengupload foto</span>
            </div>
          </div><br>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" id="judul" value="{{ $DataPengumuman->judul }}" >
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
              rows="12">{{$DataPengumuman->isi}}</textarea>
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