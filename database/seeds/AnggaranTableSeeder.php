<?php

use Illuminate\Database\Seeder;

class AnggaranTableSeeder extends Seeder
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
                'dana' => '200000000',
                'tahun' => '2018',
                'periode' => 'murni',
                'status' => 1,
            ],
            [
                'dana' => '100000000',
                'tahun' => '2018',
                'periode' => 'perubahan',
                'status' => 1,
            ]
        ];

        \DB::table('anggaran')->insert($data);
    }
}
