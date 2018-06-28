<?php

use Illuminate\Database\Seeder;

class SuratTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'nomor' => '090/123-DKIS/2018',
            'uraian' => '
                Mengikuti Sosialisasi Evaluasi Sistem Pemerintah Berbasis Elektronik pada tanggal 13 April 2018 bertempat di Ruang Rapat Samudera Pasai lantai V Gedung Kementrian PANRB Jalan Jenderal Sudirman Kavling 69 Jakarta 12190 berdasarkan surat dari Kementrian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Republik Indonesia Nomor B/178/S.KT.03/2018 tanggal 03 April 2018.
            ',
            'tanggal' => '2018-04-10',
            'pegawai_id' => '1',
            'status' => 1,
        ];

        \DB::table('surat_perintah')->insert($data);

        $sppd = [
            [
                'nomor' => '090/117-DKIS/2018',
                'perjalanan' => 'Mengikuti Pendidikan dan Pelatihan Kepemimpinan Tingkat IV Angkatan I',
                'tempat_berangkat' => 'Cirebon',
                'tempat_tujuan' => 'Bandung',
                'tanggal_berangkat' => '2018-02-12',
                'tanggal_kembali' => '2018-03-04',
                'pengikut' => '',
                'keterangan' => '',
                'pegawai_id' => '3',
                'surat_perintah_id' => '1',
                'status' => 1
            ],
            [
                'nomor' => '090/118-DKIS/2018',
                'perjalanan' => 'Mengikuti Pendidikan dan Pelatihan Kepemimpinan Tingkat IV Angkatan I',
                'tempat_berangkat' => 'Cirebon',
                'tempat_tujuan' => 'Bandung',
                'tanggal_berangkat' => '2018-02-12',
                'tanggal_kembali' => '2018-03-04',
                'pengikut' => '',
                'keterangan' => '',
                'pegawai_id' => '4',
                'surat_perintah_id' => '1',
                'status' => 0
            ]
        ];

        \DB::table('sppd')->insert($sppd);
    }
}
