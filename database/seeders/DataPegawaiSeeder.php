<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class DataPegawaiSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for($i=1 ; $i <= 20; $i++){
            Pegawai::create([
                'nip'=>1+$i,
                'nama'=>'Kosong',
                'pangkat'=>'Kosong',
                'golongan'=>'Kosong',
                'jabatan'=>'Kosong',
                'foto'=>'Kosong',
            ]);
        }
    }
}
