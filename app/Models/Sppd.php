<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sppd extends Model
{
    protected $table = 'sppd';
    protected $fillable = [
    	'nomor','perjalanan',
    	'tempat_berangkat','tempat_tujuan',
    	'tanggal_berangkat','tanggal_kembali',
    	'pengikut',
    	'keterangan',
		'pegawai_id', 'surat_perintah_id'
	];

	public function pengeluaran()
	{
		return $this->hasOne(Pengeluaran::class);
	}
	
	public function pegawai()
	{
		return $this->belongsTo(Pegawai::class);
	}

	public function surat()
	{
		return $this->belongsTo(SuratPerintah::class, 'surat_perintah_id');
	}
}
