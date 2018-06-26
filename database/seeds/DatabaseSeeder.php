<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(InstansiTableSeeder::class);
        $this->call(BiayaTableSeeder::class);
        $this->call(PegawaiTableSeeder::class);
        $this->call(SuratTableSeeder::class);
        $this->call(PengeluaranTableSeeder::class);
        $this->call(AnggaranTableSeeder::class);
        $this->call(TransaksiTableSeeder::class);
    }
}
