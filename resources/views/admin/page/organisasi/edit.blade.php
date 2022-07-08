@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
      <h4 style="margin:20px;">Formulir Edit Organisasi</h4> <hr>
@endsection

@section('main-content')
  <div class="card-body">
    <form method="post" action="{{url('/organisasi.'.$DataOrganisasi->id)}}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" value="PUT" name="_method">
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Nama Organisasi</label>
                <input type="text" class="form-control" name="organisasi" id="organisasi" value="{{$DataOrganisasi->organisasi}}" >
              </div>
              @error('organisasi')
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