<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Organisasi;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 9;
        $data_organisasi = Organisasi::orderBy('organisasi')->paginate($batas);
        $no = ($batas * ($data_organisasi->currentpage()-1))+1;
        return view('admin.page.organisasi.tampil',['DataOrganisasi' => $data_organisasi, 'no'=>$no]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.organisasi.tambah');
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
            'organisasi' => 'required',
        ])->validated();

        $organisasi = new Organisasi;
        $organisasi->organisasi = $request->organisasi;
        $organisasi->save();
        return redirect('/organisasi')->with('status', 'Data organisasi berhasil ditambahkan');

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
        $data_organisasi = Organisasi::find($id);
        return view('admin.page.organisasi.edit',['DataOrganisasi' => $data_organisasi]);
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
            'organisasi' => 'required',
        ])->validated();

        $data_organisasi = Organisasi::find($id);
        $data_organisasi->organisasi = $request->organisasi;
        $data_organisasi->update();
        return redirect('/organisasi')->with('status', 'Data organisasi berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_organisasi = Organisasi::find($id);
        $data_organisasi->delete();
        return redirect('/organisasi')->with('status','Data Organisasi Berhasil Dihapus');;
    }

    public function search(Request $request)
    {
        $batas = 9;
        $cari = $request->katakunci;
        $data_organisasi = Organisasi::where('organisasi','like',"%".$cari."%")->orderBy('organisasi')->paginate($batas);
        $jumlah_data = $data_organisasi->count("id");
        $no = ($batas * ($data_organisasi->currentpage()-1))+1;
        return view('admin.page.organisasi.cari',['DataOrganisasi' => $data_organisasi,'JumlahDataOrganisasi'=>$jumlah_data,'no'=>$no,'cari'=>$cari]);
    }

}
