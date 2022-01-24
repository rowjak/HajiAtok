<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AkimSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Models\User;
        $user->nama_pegawai = "Tokhidin";
        $user->username = "rowjak";
        $user->role = "panitera";
        $user->email = "tokhidin@gmail.com";
        $user->password = \Hash::make("rowjak");
        $user->theme = 'Light';
        $user->save();
        $this->command->info("Administrator Berhasil Dibuat!");

    //    DB::table('users')->insert($data);

    //    php artisan db:seed --class=AkimSeed
    }
}
