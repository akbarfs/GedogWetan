<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 2;
        $data_jabatan = Jabatan::orderBy('jabatan')->paginate($batas);
        $no = ($batas * ($data_jabatan->currentpage()-1))+1;
        return view('admin.page.jabatan.tampil',['DataJabatan' => $data_jabatan, 'no'=>$no]);
    }
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.jabatan.tambah');
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
            'jabatan' => 'required',
        ])->validated();

        $jabatan = new Jabatan;
        $jabatan->jabatan = $request->jabatan;
        $jabatan->save();
        return redirect('/jabatan')->with('status', 'Data jabatan berhasil ditambahkan');

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
        $data_jabatan = Jabatan::find($id);
        return view('admin.page.jabatan.edit',['DataJabatan' => $data_jabatan]);
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
            'jabatan' => 'required',
        ])->validated();

        $data_jabatan = Jabatan::find($id);
        $data_jabatan->jabatan = $request->jabatan;
        $data_jabatan->update();
        return redirect('/jabatan')->with('status', 'Data jabatan berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_jabatan = Jabatan::find($id);
        $data_jabatan->delete();
        return redirect('/jabatan')->with('status','Data jabatan Berhasil Dihapus');;
    }

    public function search(Request $request)
    {
        $batas = 2;
        $cari = $request->katakunci;
        $data_jabatan = Jabatan::where('jabatan','like',"%".$cari."%")->orderBy('jabatan')->paginate($batas);
        $jumlah_data = $data_jabatan->count("id");
        $no = ($batas * ($data_jabatan->currentpage()-1))+1;
        return view('admin.page.jabatan.cari',['DataJabatan' => $data_jabatan,'JumlahDataJabatan'=>$jumlah_data,'no'=>$no,'cari'=>$cari]);
    }

}
