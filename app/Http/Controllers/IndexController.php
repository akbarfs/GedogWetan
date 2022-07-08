<?php
 
namespace App\Http\Controllers;

use App\Models\Konten;
use App\Models\Berita;
use App\Models\Kategori;
use App\Models\Penulis;
use App\Models\Tag;
use App\Models\Pengumuman;
use App\Models\Pengurus;
use App\Models\Kontak;
use App\Models\Potensi;
use App\Models\Slide;
use Illuminate\Http\Request;
 
class IndexController extends Controller
{
    public function index()
    {
        $batas = 3;
        $konten = Konten::all();
        $potensi = Potensi::all();
        $slide = Slide::all();
        $data_berita = Berita::orderBy('updated_at')->paginate($batas);
        $pengumuman = Pengumuman::orderBy('updated_at')->paginate($batas);
        $pengurus = Pengurus::where('id_jabatan', 1)->get(['nama','id_organisasi','id_jabatan','foto']);
        $kontak = Kontak::orderBy('judul','DESC')->get();
        return view("index", ['konten' => $konten, 'data_berita' => $data_berita, 'pengumuman' => $pengumuman, 'pengurus' => $pengurus,'kontak' => $kontak, 'potensi' => $potensi, 'slide' => $slide]);
    }

    public function show($id)
    {
        $data_berita = Berita::find($id);
        return view('detail.detailberita',['DataBerita' => $data_berita]);
    }

    public function info($id)
    {
        $data_pengumuman = Pengumuman::find($id);
        return view('detail.detailpengumuman',['DataPengumuman' => $data_pengumuman]);
    }

    public function showorg($id)
    {
        $data_pengurus = Pengurus::find($id);
        return view('detail.detailorganisasi',['DataPengurus' => $data_pengurus]);
    }

    public function allberita(){
        return view('detail.berita.all');
    }
}