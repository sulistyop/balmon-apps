<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
            User::create([
                'name'=>'Sella',
                'email'=>'sella@gmail.com',
                'password'=>'sela123456'
            ]);
        
    }
}
