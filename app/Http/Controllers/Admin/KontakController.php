<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Kontak;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 5;
        $data_kontak = Kontak::orderBy('judul')->paginate($batas);
        $no = ($batas * ($data_kontak->currentpage()-1))+1;
        return view('admin.page.kontak.tampil',['DataKontak' => $data_kontak, 'no'=>$no]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_kontak = Kontak::find($id);
        return view('admin.page.kontak.edit',['DataKontak' => $data_kontak]);
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
            'kontak' => 'required',
        ])->validated();

        $data_kontak = Kontak::find($id);
        $data_kontak->judul = $request->judul;
        $data_kontak->kontak = $request->kontak;
        $data_kontak->update();
        return redirect('/kontak')->with('status', 'Data kontak berhasil diubah');

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
        $batas = 5;
        $cari = $request->katakunci;
        $data_kontak = Kontak::where('judul','like',"%".$cari."%")->orderBy('judul')->paginate($batas);
        $jumlah_data = $data_kontak->count("id");
        $no = ($batas * ($data_kontak->currentpage()-1))+1;
        return view('admin.page.kontak.cari',['DataKontak' => $data_kontak,'JumlahDataKontak'=>$jumlah_data,'no'=>$no,'cari'=>$cari]);
    }

}
