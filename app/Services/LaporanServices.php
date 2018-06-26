<?php

namespace App\Services;

use DB;
use App\Models\Sppd;
use App\Models\Anggaran;
use App\Models\Transaksi;
class LaporanServices {
    
    public function reportByMonth($request)
    {
        $date = explode("-",$request->bulan);
        $from = $date[1] . '-' . $date[0] . '-' . '1';
        $to = $date[1] . '-' . $date[0] . '-' . '31';
        $dt = new \Carbon\Carbon($from);
        setlocale(LC_TIME, 'IND');
        
        $anggaran = Anggaran::where('tahun', $date[1])->sum('dana');
        $sppd = Transaksi::whereBetween('tanggal', [$from, $to])->sum('out');
        $saldo = Transaksi::select('saldo')->whereYear('tanggal', $date[1])->orderBy('id', 'DESC')->first()->saldo;
        $sppdDetail = Sppd::with('pengeluaran')->whereBetween('tanggal_berangkat', [$from, $to])->where('status', 1)->get();
        
        $data = [
            'total_anggaran' => $anggaran,
            'total_sppd' => $sppd,
            'sisa' => $saldo,
            'sppd_detail' => $sppdDetail,
            'tanggal' => "Per-Bulan : {$dt->formatLocalized('%B %Y')}"
        ];

        return $data;
    }

    public function reportByYear($request)
    {
        $anggaran = Anggaran::where('tahun', $request->tahun)->sum('dana');
        $sppd = Transaksi::whereYear('tanggal', $request->tahun)->sum('out');
        $saldo = Transaksi::select('saldo')->whereYear('tanggal', $request->tahun)->orderBy('id', 'DESC')->first()->saldo;
        $sppdDetail = Sppd::with('pengeluaran')->whereYear('tanggal_berangkat', $request->tahun)->where('status', 1)->get();
        
        $data = [
            'total_anggaran' => $anggaran,
            'total_sppd' => $sppd,
            'sisa' => $saldo,
            'sppd_detail' => $sppdDetail,
            'tanggal' => "Per-Tahun : {$request->tahun}"
        ];

        return $data;
    }
}