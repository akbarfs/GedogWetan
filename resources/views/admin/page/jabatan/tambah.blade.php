@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
      <h4 style="margin:20px;">Formulir Tambah Data Jabatan</h4> <hr>
@endsection

@section('main-content')
  <div class="card-body">
    <form method="post" action="{{url('/jabatan')}}" enctype="multipart/form-data">
      @csrf
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Jabatan</label>
                <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Masukkan data jabatan" >
              </div>
              @error('jabatan')
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