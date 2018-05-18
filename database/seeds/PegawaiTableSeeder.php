<?php

use Illuminate\Database\Seeder;

class PegawaiTableSeeder extends Seeder
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
                'nip' => '196808221997031003',
                'nama' => 'IING DAIMAN, S.Ip, M.Si.',
                'skpd' => 'DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK',
                'pangkat' => 'Pembina Tk.I',
                'golongan' => 'IV/b',
                'jabatan' => 'KEPALA DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK',
                'status' => 1,
            ],
            [
                'nip' => '198405072010012012',
                'nama' => 'MEISARI, SE.',
                'skpd' => 'DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK',
                'pangkat' => 'Penata Muda Tk.I',
                'golongan' => 'III/b',
                'jabatan' => 'Pelaksana',
                'status' => 1
            ],
            [
                'nip' => '197607262006041013',
                'nama' => 'ANDI SUKMANA, SE, Akt.',
                'skpd' => 'DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK',
                'pangkat' => 'Penata Tk.I',
                'golongan' => 'III/d',
                'jabatan' => 'KEPALA SEKSI KEAMANAN INFORMASI E-GOVERNMENT',
                'status' => 1,
            ],
            [
                'nip' => '197510262014061002',
                'nama' => 'ANDRE GINANJAR FERDHIANSYAH PRATAMA, ST.',
                'skpd' => 'DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK',
                'pangkat' => 'Penata Muda',
                'golongan' => 'III/a',
                'jabatan' => 'Pelaksana',
                'status' => 1
            ],
        ];

        \DB::table('pegawai')->insert($data);
    }
}
