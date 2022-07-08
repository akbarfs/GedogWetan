@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
    <h4 style="margin:20px;">Daftar Berita</h4>
    <div class="col">
      <form method="get" action="{{url('/slide.cari')}}">
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
    <div class="col"><a href="{{url('/slide.tambah')}}">
    <button class="btn btn-primary" ><i class="nc-icon nc-simple-add"></i> Tambah</button></a>
    </div>

@endsection

          @section('main-content')
              @if ($JumlahDataSlide>0)
              <div class="alert alert-success">Ditemukan {{ $JumlahDataSlide}} data dengan kata kunci : {{$cari}}</div>
                  
                  <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                    <tr>
                      <th width="5%"><strong>No</strong></th>
                      <th width="30%"><strong>Judul</strong></th>
                      <th width="30%"><strong>Action</strong></th>
                    </tr>
                    </thead>
                    <tbody>
                  @if (!empty($DataSlide))
                  @foreach($DataSlide as $key => $Slide)
                    <tr>
                      <td align="center">{{$no}}</td>
                      <td>{{$Slide->judul}}</td>
                      <td align="center">
                        <form action="{{url('/slide.'.$Slide->id)}}" method="Post" onsubmit="return confirm('Apakah data ingin dihapus?')">
                        @csrf
                        <a href="{{url('/slide.'.$Slide->id.'.detail')}}" class="btn btn-xs btn-info" title="Detail"><i class="nc-icon nc-badge"></i></a>
                        <a href="{{url('/slide.'.$Slide->id.'.edit')}}" class="btn btn-xs btn-info" title="Edit"><i class="nc-icon nc-settings-gear-65"></i></a>
                        <input type="hidden" value="DELETE" name="_method">
                        <button type="submit" class="btn btn-xs btn-info" title="Hapus"><i class="nc-icon nc-simple-remove"></i></button>
                      </form>
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
                      <a href="{{url('/slide')}}"><input type="button" class="btn btn-danger" value="Klik Disini untuk kembali"></a>
                  </div>
                  @endif

                  </div>
                <ul class="pagination">
                    {{$DataSlide->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection