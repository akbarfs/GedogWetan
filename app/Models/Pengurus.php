<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;
    protected $table = 'pengurus';
    protected $primaryKey = 'id';

    public function jabatan(){
        return $this->
        belongsTo("App\Models\Jabatan","id_jabatan");
    }

    public function organisasi(){
        return $this->belongsTo("App\Models\Organisasi","id_organisasi");
    }

}
