@extends('admin.layouts.app')
@section('content-header')
  <div class="content">
    <div class="card card-user">
    <h4 style="margin:20px;">Daftar Konten</h4>
    <div class="col">
      <form method="get" action="{{url('/konten.cari')}}">
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
                  @if (session('status'))
                  <div class="alert alert-success">{!! session()->get('status') !!}</div>
                  @endif
                  
                  <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                    <tr>
                      <th width="5%"><strong>No</strong></th>
                      <th width="30%"><strong>Judul</strong></th>
                      <th width="30%"><strong>tanggal</strong></th>
                      <th width="30%"><strong>Action</strong></th>
                    </tr>
                    </thead>
                    <tbody>
                  @if (!empty($DataKonten))
                  @foreach($DataKonten as $key => $Konten)
                    <tr>
                      <td align="center">{{$no}}</td>
                      <td>{{$Konten->judul}}</td>
                      <td>{{$Konten->created_at}}</td>
                      <td align="center">
                        @csrf
                        <a href="{{url('/konten.'.$Konten->id_konten.'.detail')}}" class="btn btn-xs btn-info" title="Detail"><i class="nc-icon nc-badge"></i></a>
                        <a href="{{url('/konten.'.$Konten->id_konten.'.edit')}}" class="btn btn-xs btn-info" title="Edit"><i class="nc-icon nc-settings-gear-65"></i></a>
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
                  </div>
                <ul class="pagination">
                    {{$DataKonten->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection