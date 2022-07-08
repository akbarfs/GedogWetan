@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
    <h4 style="margin:20px;">List Kontak</h4>
    <div class="col">
      <form method="get" action="{{url('/kontak.cari')}}">
      <div class="input-group no-border">
        <input type="text" value="" class="form-control" placeholder="Search..." id="kata_kunci" name="katakunci">
          <div class="input-group-append">
            <div class="input-group-text">
              <button type="submit" class="btn btn-primary nc-icon nc-zoom-split" title="Cari"></button>
            </div>
          </div>
      </div>
    </form>
    </div>

@endsection

          @section('main-content')
          @if ($JumlahDataKontak>0)
            <div class="alert alert-success">Ditemukan {{ $JumlahDataKontak}} data dengan kata kunci : {{$cari}}</div>        
                  <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                    <tr>
                      <th width="5%"><strong>No</strong></th>
                      <th width="30%"><strong>Judul</strong></th>
                      <th width="30%"><strong>Kontak</strong></th>
                      <th width="35%"><strong>Action</strong></th>
                    </tr>
                    </thead>
                    <tbody>
                  @if (!empty($DataKontak))
                  @foreach($DataKontak as $key => $Kontak)
                    <tr>
                      <td align="center">{{$no}}</td>
                      <td>{{$Kontak->judul}}</td>
                      <td>{{$Kontak->kontak}}</td>
                      <td align="center">
                        @csrf
                        <a href="{{url('/kontak.'.$Kontak->id_kontak.'.edit')}}" class="btn btn-xs btn-info" title="Edit"><i class="nc-icon nc-settings-gear-65"></i></a>
                      </td>
                    </tr>
                    @php
                    $no++
                    @endphp
                    @endforeach
                  @endif
                  </tbody>
                  </table>
                  @else
                  <div class="alert alert-danger">Data dengan kata kunci : {{$cari}} Tidak Ditemukan
                      <a href="{{url('/kontak')}}"><input type="button" class="btn btn-danger" value="Klik Disini untuk kembali"></a>
                  </div>
                  @endif
                  </div>
                <ul class="pagination">
                    {{$DataKontak->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
