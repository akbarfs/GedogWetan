<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use Validator;
use public\assets\img;
use File;

class SlideController extends Controller
{    
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $batas = 5;
            $data_slide = Slide::orderBy('judul')->paginate($batas);
            $no = ($batas * ($data_slide->currentpage()-1))+1;
            return view('admin.page.slide.tampil',['DataSlide' => $data_slide, 'no'=>$no]);
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('admin.page.slide.tambah');
    
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
                'gambar' => 'required|image|mimes:jpeg,jpg,png,mkv,mp4,3gp',
            ])->validated();
    
            $slide = new Slide;
            $slide->judul = $request->judul;
            $gambar = $request->gambar;
            $namafile = time().'.'.$gambar->
            getClientOriginalExtension();
            $gambar->move('assets/img/',$namafile);
            $slide->gambar = $namafile;
            $slide->save();
            return redirect('/slide')->with('status', 
            'Data slide berhasil ditambahkan');
    
        }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_slide = Slide::find($id);
        return view('admin.page.slide.detail',['DataSlide' => $data_slide]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_slide = Slide::find($id);
        return view('admin.page.slide.edit', ['DataSlide' => $data_slide]);
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
            'gambar' => 'image|mimes:jpeg,jpg,png',
        ])->validated();

        $data_slide = Slide::find($id);

        $namafileold = $data_slide->gambar;
        if($request->has('gambar')){
            if(File::exists('assets/img/'.$namafileold)) {
                File::delete('assets/img/'.$namafileold);
            }
            $data_slide->judul = $request->judul;
            $gambar = $request->gambar;
            $namafile = time().'.'.$gambar->
            getClientOriginalExtension();
            $gambar->move('assets/img/',$namafile);
            $data_slide->gambar = $namafile;
        }else{
            $data_slide->judul = $request->judul;
        }
        $data_slide->update();
        return redirect('/slide')->with('status','Data slide berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_slide = Slide::find($id);
        $namafile = $data_slide->gambar;
        if(File::exists('assets/img/'.$namafile)) {
            File::delete('assets/img/'.$namafile);
        }
        $data_slide->delete();
        return redirect('/slide')->with('status', 
        'Data slide berhasil dihapus');
    }
    
    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->katakunci;
        $data_slide = Slide::where('judul','like',"%".$cari."%")->orderBy('judul')->paginate($batas);
        $jumlah_data = $data_slide->count("id");
        $no = ($batas * ($data_slide->currentpage()-1))+1;
        return view('admin.page.slide.cari',['DataSlide' => $data_slide,'JumlahDataSlide'=>$jumlah_data,'no'=>$no,'cari'=>$cari]);
    }
}
