<?php

use Illuminate\Database\Seeder;

class TransaksiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'tanggal' => '2018-02-15',
            'last' => '300000000',
            'in' => '0',
            'out' => '767000',
            'saldo' => '299233000',
            'pengeluaran_id' => '1',
        ];

        \DB::table('transaksi')->insert($data);
    }
}
