<?php

use Illuminate\Database\Seeder;

class PengeluaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'nomor' => '090/II-DKIS/2018',
            'sumber_dana' => 'Bendahara Pengeluaran',
            'nominal' => '767000',
            'terbilang' => 'Tujuh Ratus Enam Puluh Tujuh Ribu Rupiah',
            'keperluan' => 'Biaya Perjalanan Dinas Ke Bandung Tanggal 12 Feb s/d 04 Maret 2018',
            'belanja_jenis' => '-',
            'belanja_obyek' => '-',
            'belanja_rincian' => '-',
            'tanggal' => '2018-03-15',
            'sppd_id' => '1', 
        ];

        \DB::table('pengeluaran')->insert($data);

        $biaya = [
            [
                'pengeluaran_id' => 1,
                'biaya_id' => 1,
                'uraian' => 'Golongan III',
                'qty' => 1,
                'satuan' => 'Hari',
                'biaya' => 519000,
                'total' => 519000
            ],
            [
                'pengeluaran_id' => 1,
                'biaya_id' => 2,
                'uraian' => 'Bensin',
                'qty' => 1,
                'satuan' => null,
                'biaya' => 248000,
                'total' => 248000
            ],
        ];

        \DB::table('pengeluaran_detail')->insert($biaya);
    }
}
