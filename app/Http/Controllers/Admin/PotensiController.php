<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Potensi;
use Validator;
use public\assets\img;
use File;

class PotensiController extends Controller
{
public function index()
    {
        $batas = 5;
        $data_potensi = Potensi::orderBy('potensi')->paginate($batas);
        $no = ($batas * ($data_potensi->currentpage()-1))+1;
        return view('admin.page.potensi.tampil',['DataPotensi' => $data_potensi, 'no'=>$no]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.potensi.tambah');

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
            'potensi' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,jpg,png,mkv,mp4,3gp',
        ])->validated();

        $potensi= new Potensi;
        $potensi->potensi = $request->potensi;
        $potensi->deskripsi = $request->deskripsi;
        $gambar = $request->gambar;
        $namafile = time().'.'.$gambar->
        getClientOriginalExtension();
        $gambar->move('assets/img/',$namafile);
        $potensi->gambar = $namafile;
        $potensi->save();
        return redirect('/potensi')->with('status', 
        'Data potensi berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_potensi = Potensi::find($id);
        return view('admin.page.potensi.detail',['DataPotensi' => $data_potensi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_potensi = Potensi::find($id);
        return view('admin.page.potensi.edit', ['DataPotensi' => $data_potensi]);
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
            'potensi' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,jpg,png',
        ])->validated();

        $data_potensi = Potensi::find($id);

        $namafileold = $data_potensi->gambar;
        if($request->has('gambar')){
            if(File::exists('assets/img/'.$namafileold)) {
                File::delete('assets/img/'.$namafileold);
            }
            $data_potensi->potensi = $request->potensi;
            $data_potensi->deskripsi = $request->deskripsi;
            $gambar = $request->gambar;
            $namafile = time().'.'.$gambar->
            getClientOriginalExtension();
            $gambar->move('assets/img/',$namafile);
            $data_potensi->gambar = $namafile;
        }else{
            $data_potensi->potensi = $request->potensi;
            $data_potensi->deskripsi = $request->deskripsi;
        }
        $data_potensi->update();
        return redirect('/potensi')->with('status','Data potensi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_potensi = Potensi::find($id);
        $namafile = $data_potensi->gambar;
        if(File::exists('assets/img/'.$namafile)) {
            File::delete('assets/img/'.$namafile);
        }
        $data_potensi->delete();
        return redirect('/potensi')->with('status', 
        'Data potensi berhasil dihapus');
    }
    
    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->katakunci;
        $data_potensi = Potensi::where('potensi','like',"%".$cari."%")->orderBy('potensi')->paginate($batas);
        $jumlah_data = $data_potensi->count("id");
        $no = ($batas * ($data_potensi->currentpage()-1))+1;
        return view('admin.page.potensi.cari',['DataPotensi' => $data_potensi,'JumlahDataPotensi'=>$jumlah_data,'no'=>$no,'cari'=>$cari]);
    }
}