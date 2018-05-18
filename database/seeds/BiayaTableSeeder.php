<?php

use Illuminate\Database\Seeder;

class BiayaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'nama' => 'Uang Harian',
                'status' => 1,
            ],
            [
                'id' => 2,
                'nama' => 'Biaya Transport',
                'status' => 1,
            ],
            [
                'id' => 3,
                'nama' => 'Biaya Penginapan',
                'status' => 1,
            ],
        ];
        
        \DB::table('biaya')->insert($data);
    }
}
