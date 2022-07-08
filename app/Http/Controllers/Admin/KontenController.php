<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Konten;
use Validator;

class KontenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 2;
        $data_konten = Konten::orderBy('judul')->paginate($batas);
        $no = ($batas * ($data_konten->currentpage()-1))+1;
        return view('admin.page.konten.tampil',['DataKonten' => $data_konten, 'no'=>$no]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_konten = Konten::find($id);
        return view('admin.page.konten.detail',['DataKonten' => $data_konten]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_konten = Konten::find($id);
        return view('admin.page.konten.edit',['DataKonten' => $data_konten]);
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
        ])->validated();

        $data_konten = Konten::find($id);
        $data_konten->judul = $request->judul;
        $data_konten->isi = $request->isi;
        $data_konten->update();
        return redirect('/konten')->with('status','Data konten berhasil diubah');        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $batas = 2;
        $cari = $request->katakunci;
        $data_konten = Konten::where('judul','like',"%".$cari."%")->orderBy('judul')->paginate($batas);
        $jumlah_data = $data_konten->count("id");
        $no = ($batas * ($data_konten->currentpage()-1))+1;
        return view('admin.page.konten.cari',['DataKonten' => $data_konten,'JumlahDataKonten'=>$jumlah_data,'no'=>$no,'cari'=>$cari]);
    }

}
