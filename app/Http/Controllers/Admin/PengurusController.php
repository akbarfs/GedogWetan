<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengurus;
use App\Models\Jabatan;
use App\Models\Organisasi;
use Validator;
use public\assets\img;
use File;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batas = 2;
        $data_pengurus = Pengurus::orderBy('nama')->paginate($batas);
        $no = ($batas * ($data_pengurus->currentpage()-1))+1;
        return view('admin.page.pengurus.tampil',['DataPengurus' => $data_pengurus, 'no'=>$no]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_jabatan = Jabatan::orderBy('jabatan','asc')->get();
        $data_organisasi = Organisasi::orderBy('organisasi','asc')->get();
        return view('admin.page.pengurus.tambah',['DataJabatan' => $data_jabatan, 'DataOrganisasi' => $data_organisasi]);

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
            'organisasi' => 'required',
            'nama' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png,mkv,mp4,3gp',
        ])->validated();

        $pengurus= new Pengurus;
        $pengurus->id_jabatan = $request->jabatan;
        $pengurus->id_organisasi = $request->organisasi;
        $pengurus->nama = $request->nama;
        $foto = $request->foto;
        $namafile = time().'.'.$foto->getClientOriginalExtension();
        $foto->move('assets/img/',$namafile);
        $pengurus->foto = $namafile;
        $pengurus->save();
        return redirect('/pengurus')->with('status', 
        'Data berita berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_pengurus = Pengurus::find($id);
        return view('admin.page.pengurus.detail',['DataPengurus' => $data_pengurus]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_pengurus = Pengurus::find($id);
        $data_jabatan = Jabatan::orderBy('jabatan','asc')->get();
        $data_organisasi = Organisasi::orderBy('organisasi','asc')->get();
        return view('admin.page.pengurus.edit', ['DataPengurus' => $data_pengurus,'DataJabatan' => $data_jabatan, 'DataOrganisasi' => $data_organisasi ]);
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
            'organisasi' => 'required',
            'nama' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png,mkv,mp4,3gp',
        ])->validated();

        $data_pengurus = Pengurus::find($id);

        $namafileold = $data_pengurus->foto;
        if($request->has('foto')){
            if(File::exists('assets/img/'.$namafileold)) {
                File::delete('assets/img/'.$namafileold);
            }
            $data_pengurus->id_jabatan = $request->jabatan;
            $data_pengurus->nama = $request->nama;
            $data_pengurus->id_organisasi = $request->organisasi;
            $foto = $request->foto;
            $namafile = time().'.'.$foto->
            getClientOriginalExtension();
            $foto->move('assets/img/',$namafile);
            $data_pengurus->foto = $namafile;
        }else{
            $data_pengurus->id_jabatan = $request->jabatan;
            $data_pengurus->nama = $request->nama;
            $data_pengurus->id_organisasi = $request->organisasi;
        }
        $data_pengurus->update();
        return redirect('/pengurus')->with('status','Data berita berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_pengurus = Pengurus::find($id);
        $namafile = $data_pengurus->foto;
        if(File::exists('assets/img/'.$namafile)) {
            File::delete('assets/img/'.$namafile);
        }
        $data_pengurus->delete();
        return redirect('/pengurus')->with('status', 
        'Data berita berhasil dihapus');
    }
    
    public function search(Request $request)
    {
        $batas = 2;
        $cari = $request->katakunci;
        $data_pengurus = Pengurus::where('nama','like',"%".$cari."%")->orderBy('nama')->paginate($batas);
        $jumlah_data = $data_pengurus->count("id");
        $no = ($batas * ($data_pengurus->currentpage()-1))+1;
        return view('admin.page.pengurus.cari',['DataPengurus' => $data_pengurus,'JumlahDataPengurus'=>$jumlah_data,'no'=>$no,'cari'=>$cari]);
    }
}

?>