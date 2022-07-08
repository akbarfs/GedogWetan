@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
      <h4 style="margin:20px;">Formulir Edit Data Pengurus</h4> <hr>
@endsection

@section('main-content')
  <div class="card-body">
    <form method="post" action="{{url('/pengurus.'.$DataPengurus->id)}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" value="PUT" name="_method">
      <div class="row">
            <div class="col-md-6 pr-2">
                <label for="">Foto</label><br>
                <input type="file" name="foto" id="customfile">
              @error('foto')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div><br>

          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" value="{{ $DataPengurus->nama}}" >
              </div>
              @error('nama')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div>

          
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Jabatan</label>
                <div class="form-group">
                <select class="form-control  @error('penerbit') 
              is-invalid @enderror" id="jabatan" name="jabatan">
                <option value="">- Pilih Jabatan -</option>
                @if (!empty($DataJabatan))
                    @foreach($DataJabatan as $key => $Jabatan)
                        <option value="{{ $Jabatan->
                       id }}"
                        @if ($Jabatan->
                     id==$DataPengurus->id_jabatan)
                          selected
                        @endif
                        >{{ $Jabatan->jabatan }}</option>
                    @endforeach
                @endif
              </select>
              </div>
              @error('jabatan')
                <span class="text-denger">{{ $message }}</span>
              @enderror
            </div>
          </div>
        </div>

          <div class="row">
            <div class="col-md-6 pr-1">
            <label>Organisasi</label>
              <div class="form-group">
              <select class="form-control  @error('organisasi') 
              is-invalid @enderror" id="organisasi" name="organisasi">
                <option disabeled>- Pilih Organisasi -</option>
                @if (!empty($DataOrganisasi))
                    @foreach($DataOrganisasi as $key => $Organisasi)
                        <option value="{{ $Organisasi->
                       id }}"
                        @if ($Organisasi->
                     id==$DataPengurus->id_organisasi)
                          selected
                        @endif
                        >{{ $Organisasi->organisasi }}</option>
                    @endforeach
                @endif              
              </select>
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