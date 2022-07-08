<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PenulisController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\PengurusController;
use App\Http\Controllers\Admin\KontenController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\OrganisasiController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Admin\PotensiController;
use App\Http\Controllers\IndexController;

Route::middleware('auth')->group(function(){
    //Profile
    Route::get('/profil',[ProfilController::class,'index'])->name('admin.profil');
    Route::get('/profil.{id}.edit', [ProfilController::class, 'edit']);
    Route::put('/profil.{id}', [ProfilController::class, 'update']);
    //Manajeman User
    Route::get('/user',[UserController::class,'index'])->name('admin.user');
    Route::get('/user.cari',[UserController::class,'search']);
    Route::get('/user.tambah',[UserController::class,'create']);
    Route::post('/user',[UserController::class,'store']);
    Route::get('/user.{id}.edit',[UserController::class,'edit']);
    Route::put('/user.{id}',[UserController::class,'update']);
    Route::get('/user.{id}',[UserController::class,'show']);
    Route::delete('/user.{id}',[UserController::class,'destroy']);
    //Berita
    Route::get('/berita',[BeritaController::class,'index'])->name('admin.berita');
    Route::get('/berita.cari',[BeritaController::class,'search']);
    Route::get('/berita.tambah',[BeritaController::class,'create']);
    Route::post('/berita',[BeritaController::class,'store']);
    Route::get('/berita.{id}.edit',[BeritaController::class,'edit']);
    Route::put('/berita.{id}',[BeritaController::class,'update']);
    Route::get('/berita.{id}',[BeritaController::class,'show']);
    Route::delete('/berita.{id}',[BeritaController::class,'destroy']);
    //Kategori
    Route::get('/kategori',[KategoriController::class,'index'])->name('admin.kategori');
    Route::get('/kategori.cari',[KategoriController::class,'search']);
    Route::get('/kategori.tambah',[KategoriController::class,'create']);
    Route::post('/kategori',[KategoriController::class,'store']);
    Route::get('/kategori.{id}.edit',[KategoriController::class,'edit']);
    Route::put('/kategori.{id}',[KategoriController::class,'update']);
    Route::delete('/kategori.{id}',[KategoriController::class,'destroy']);
    //Penulis
    Route::get('/penulis',[PenulisController::class,'index'])->name('admin.penulis');
    Route::get('/penulis.cari',[PenulisController::class,'search']);
    Route::get('/penulis.tambah',[PenulisController::class,'create']);
    Route::post('/penulis',[PenulisController::class,'store']);
    Route::get('/penulis.{id}.edit',[PenulisController::class,'edit']);
    Route::put('/penulis.{id}',[PenulisController::class,'update']);
    Route::delete('/penulis.{id}',[PenulisController::class,'destroy']);
    //Tag
    Route::get('/tag',[TagController::class,'index'])->name('admin.penulis');
    Route::get('/tag.cari',[TagController::class,'search']);
    Route::get('/tag.tambah',[TagController::class,'create']);
    Route::post('/tag',[TagController::class,'store']);
    Route::get('/tag.{id}.edit',[TagController::class,'edit']);
    Route::put('/tag.{id}',[TagController::class,'update']);
    Route::delete('/tag.{id}',[TagController::class,'destroy']);
    //Jabatan
    Route::get('/jabatan',[JabatanController::class,'index'])->name('admin.jabatan');
    Route::get('/jabatan.cari',[JabatanController::class,'search']);
    Route::get('/jabatan.tambah',[JabatanController::class,'create']);
    Route::post('/jabatan',[JabatanController::class,'store']);
    Route::get('/jabatan.{id}.edit',[JabatanController::class,'edit']);
    Route::put('/jabatan.{id}',[JabatanController::class,'update']);
    Route::delete('/jabatan.{id}',[JabatanController::class,'destroy']);
    //Organisasi
    Route::get('/organisasi',[OrganisasiController::class,'index'])->name('admin.organisasi');
    Route::get('/organisasi.cari',[OrganisasiController::class,'search']);
    Route::get('/organisasi.tambah',[OrganisasiController::class,'create']);
    Route::post('/organisasi',[OrganisasiController::class,'store']);
    Route::get('/organisasi.{id}.edit',[OrganisasiController::class,'edit']);
    Route::put('/organisasi.{id}',[OrganisasiController::class,'update']);
    Route::delete('/organisasi.{id}',[OrganisasiController::class,'destroy']);
    //Pengumuman
    Route::get('/pengumuman',[PengumumanController::class,'index'])->name('admin.pengumuman');
    Route::get('/pengumuman.cari',[PengumumanController::class,'search']);
    Route::get('/pengumuman.tambah',[PengumumanController::class,'create']);
    Route::post('/pengumuman',[PengumumanController::class,'store']);
    Route::get('/pengumuman.{id}.edit',[PengumumanController::class,'edit']);
    Route::put('/pengumuman.{id}',[PengumumanController::class,'update']);
    Route::get('/pengumuman.{id}',[PengumumanController::class,'show']);
    Route::delete('/pengumuman.{id}',[PengumumanController::class,'destroy']);
    //Konten
    Route::get('/konten',[KontenController::class,'index'])->name('admin.konten');
    Route::get('/konten.cari',[KontenController::class,'search']);
    Route::get('/konten.{id}.edit',[KontenController::class,'edit']);
    Route::put('/konten.{id}',[KontenController::class,'update']);
    Route::get('/konten.{id}',[KontenController::class,'show']);
    //Pengurus
    Route::get('/pengurus',[PengurusController::class,'index'])->name('admin.pengurus');
    Route::get('/pengurus.cari',[PengurusController::class,'search']);
    Route::get('/pengurus.tambah',[PengurusController::class,'create']);
    Route::post('/pengurus',[PengurusController::class,'store']);
    Route::get('/pengurus.{id}.edit',[PengurusController::class,'edit']);
    Route::put('/pengurus.{id}',[PengurusController::class,'update']);
    Route::get('/pengurus.{id}',[PengurusController::class,'show']);
    Route::delete('/pengurus.{id}',[PengurusController::class,'destroy']);    
    //Kontak
    Route::get('/kontak',[KontakController::class,'index'])->name('admin.kontak');
    Route::get('/kontak.cari',[KontakController::class,'search']);
    Route::get('/kontak.{id}.edit',[KontakController::class,'edit']);
    Route::put('/kontak.{id}',[KontakController::class,'update']);
    //Slide
    Route::get('/slide',[SlideController::class,'index'])->name('admin.slide');
    Route::get('/slide.cari',[SlideController::class,'search']);
    Route::get('/slide.tambah',[SlideController::class,'create']);
    Route::post('/slide',[SlideController::class,'store']);
    Route::get('/slide.{id}.edit',[SlideController::class,'edit']);
    Route::put('/slide.{id}',[SlideController::class,'update']);
    Route::get('/slide.{id}',[SlideController::class,'show']);
    Route::delete('/slide.{id}',[SlideController::class,'destroy']);
    //Potensi
    Route::get('/potensi',[PotensiController::class,'index'])->name('admin.potensi');
    Route::get('/potensi.cari',[PotensiController::class,'search']);
    Route::get('/potensi.tambah',[PotensiController::class,'create']);
    Route::post('/potensi',[PotensiController::class,'store']);
    Route::get('/potensi.{id}.edit',[PotensiController::class,'edit']);
    Route::put('/potensi.{id}',[PotensiController::class,'update']);
    Route::get('/potensi.{id}',[PotensiController::class,'show']);
    Route::delete('/potensi.{id}',[PotensiController::class,'destroy']);
    //Logout
    Route::post('/logout', [LoginController::class, 'logout']);
    Auth::routes();

});

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/detailberita.{id}',[IndexController::class,'show']);
Route::get('/detailpengumuman.{id}',[IndexController::class,'info']);
Route::get('/detailorganisasi.{id}',[IndexController::class,'showorg']);
Route::get('/allberita',[IndexController::class,'allberita']);
//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
