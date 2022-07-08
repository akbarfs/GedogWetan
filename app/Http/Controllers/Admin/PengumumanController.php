<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Pengumuman;
use public\admin\assets\img;
use File;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 2;
        $data_pengumuman = Pengumuman::orderBy('judul')->paginate($batas);
        $no = ($batas * ($data_pengumuman->currentpage()-1))+1;
        return view('admin.page.pengumuman.tampil',['DataPengumuman' => $data_pengumuman, 'no'=>$no]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.pengumuman.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,jpg,png,gif',
        ])->validated();

        $pengumuman = new Pengumuman;
        $pengumuman->judul = $request->judul;
        $pengumuman->isi = $request->isi;
        $gambar = $request->gambar;
        $namafile = time().'.'.$gambar->getClientOriginalExtension();
        $gambar->move('admin/assets/img/',$namafile);
        $pengumuman->gambar = $namafile;
        $pengumuman->save();
        return redirect('/pengumuman')->with('status', 'Data pengumuman berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_pengumuman = Pengumuman::find($id);
        return view('admin.page.pengumuman.detail',['DataPengumuman' => $data_pengumuman]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_pengumuman = Pengumuman::find($id);
        return view('admin.page.pengumuman.edit',['DataPengumuman' => $data_pengumuman]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'image|mimes:jpeg,jpg,png,gif',
        ])->validated();

        $data_pengumuman = Pengumuman::find($id);
        $namafileold = $data_pengumuman->gambar;
        if($request->has('gambar')){
            if(File::exists('admin/assets/img/'.$namafileold)) {
                File::delete('admin/assets/img/'.$namafileold);
            }
            $data_pengumuman->judul = $request->judul;
            $data_pengumuman->isi = $request->isi;
            $gambar = $request->gambar;
            $namafile = time().'.'.$gambar->
            getClientOriginalExtension();
            $gambar->move('admin/assets/img/',$namafile);
            $data_pengumuman->gambar = $namafile;
        }else{
            $data_pengumuman->judul = $request->judul;
            $data_pengumuman->isi = $request->isi;
        }
        $data_pengumuman->update();
        return redirect('/pengumuman')->with('status','Data pengumuman berhasil diubah');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_pengumuman = Pengumuman::find($id);
        $namafile = $data_pengumuman->gambar;
        if(File::exists('admin/assets/img/'.$namafile)){
            File::delete('admin/assets/img/'.$namafile);
        }
        $data_pengumuman->delete();
        return redirect('/pengumuman')->with('status','Data pengumuman Berhasil Dihapus');;

    }

    public function search(Request $request)
    {
        $batas = 2;
        $cari = $request->katakunci;
        $data_pengumuman = Pengumuman::where('judul','like',"%".$cari."%")->orderBy('judul')->paginate($batas);
        $jumlah_data = $data_pengumuman->count("id");
        $no = ($batas * ($data_pengumuman->currentpage()-1))+1;
        return view('admin.page.pengumuman.cari',['DataPengumuman' => $data_pengumuman,'JumlahDatapengumuman'=>$jumlah_data,'no'=>$no,'cari'=>$cari]);
    }
}
