<?php

use Illuminate\Database\Seeder;

class InstansiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $instansi = [
            [
                'nama' => 'DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK',
                'alamat' => 'Jalan Dr. Sudarsono No.40',
                'telepon' => '(0231) 8804620',
                'email' => 'dkis@cirebonkota.go.id',
                'situs' => 'dkis.cirebonkota.go.id',
                'logo' => 'images/logo/pemda.png',
                'status' => 1,
            ],
            [
                'nama' => 'SEKRETARIAT DAERAH',
                'alamat' => 'Jl. Siliwangi No. 84 Cirebon',
                'telepon' => '(0231) 206011',
                'email' => '',
                'situs' => '',
                'logo' => 'images/logo/pemda.png',
                'status' => 0,
            ]  
        ];

        \DB::table('instansi')->insert($instansi);
    }
}
