<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $jabatan1 = new Jabatan;
        $jabatan1->jabatan = "Karang Truna";
        $jabatan1->save();

    }
}
