@extends('layouts.app')

@php
  $no = 0;
  $setting = \App\Models\Instansi::where('status', 1)->first();
  $dt = new \Carbon\Carbon($data['pengeluaran']->tanggal);
	setlocale(LC_TIME, 'IND');
@endphp

@push('styles')
    <style>
      .invoice {
        font-family: 'Times New Roman', Times, serif;
      }
    </style>
@endpush

@section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="invoice">
            <div class="" style="position: relative;">
                <div>
                    <table width="90%" border="0">
                        <tbody>
                            <tr>
                              <td width="266" rowspan="4"><img src="{{ asset($setting->logo) }}" width="104" height="100" alt=""/></td>
                              <td width="1100" align="center"><strong>PEMERINTAH DAERAH KOTA CIREBON</strong></td>
                            </tr>
                            <tr>
                                <td align="center"><strong>{{ $setting->nama }}</strong></td>
                            </tr>
                            <tr>
                                <td align="center">{{ $setting->alamat }}, {{ $setting->telepon }} </td>
                            </tr>
                            <tr>
                                <td align="center">{{ $setting->email }}, {{ $setting->situs }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <div>
                    <table width="87%" border="0">
                        <tbody>
                            <tr>
                            <td width="239">&nbsp;</td>
                            <td width="715" align="center"><strong><u>TANDA BUKTI PENGELUARAN</u></strong></td>
                            <td width="15">&nbsp;</td>
                            </tr>
                            <tr>
                            <td>&nbsp;</td>
                            <td align="center"><strong>Nomor: {{ $data['pengeluaran']->nomor }}</strong></td>
                            <td>&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <div>
                    <table width="100%" border="0">
                    <tbody>
                        <tr>
                        <td width="144">&nbsp;</td>
                        <td width="202">Terima dari</td>
                        <td width="8">:</td>
                        <td width="625">{{ $data['pengeluaran']->sumber_dana }}</td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>
                        <td>Uang Sejumlah</td>
                        <td>:</td>
                        <td>Rp{{ Money::rupiah($data['total']) }}</td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>
                        <td>Terbilang</td>
                        <td>:</td>
                        <td>{{ Money::terbilang($data['total']) }}</td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>
                        <td>Untuk Keperluan</td>
                        <td>:</td>
                        <td>{{ $data['pengeluaran']->keperluan }}</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                <div>
                    <table width="100%" border="0">
                    <tbody>
                        <tr>
                        <td width="344">&nbsp;</td>
                        <td width="122">Jenis Belanja</td>
                        <td width="5">:</td>
                        <td width="409">{{ $data['pengeluaran']->belanja_jenis }}</td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>
                        <td>Obyek Belanja</td>
                        <td>:</td>
                        <td>{{ $data['pengeluaran']->belanja_obyek }}</td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>
                        <td>Rincian Belanja</td>
                        <td>:</td>
                        <td>{{ $data['pengeluaran']->belanja_rincian }}</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                <div>
                    <table width="100%" border="0">
                    <tbody>
                        <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        </tr>
                        <tr>
                        <td align="center">Mengatahui / Menyetujui </td>
                        <td>&nbsp;</td>
                        <td align="center">Cirebon, {{ $dt->formatLocalized('%d %B %Y') }} </td>
                        </tr>
                        <tr>
                        <td align="center">Kepala Dinas Komunikasi </td>
                        <td align="center">Bendahara Pengeluaran</td>
                        <td align="center">Yang Menerima </td>
                        </tr>
                        <tr>
                        <td align="center">Informatika dan Statistik </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        </tr>
                        <tr>
                        <td align="center">{{ $data['pengeluaran']->sppd->surat->pegawai->nama }} </td>
                        <td align="center">MEISARI, SE </td>
                        <td align="center">{{ $data['pengeluaran']->sppd->pegawai->nama }} </td>
                        </tr>
                        <tr>
                        <td align="center">NIP {{ $data['pengeluaran']->sppd->surat->pegawai->nip }} </td>
                        <td align="center">NIP 198405072010012012 </td>
                        <td align="center">NIP {{ $data['pengeluaran']->sppd->pegawai->nip }} </td>
                        </tr>
                    </tbody>
                    </table>
                </div>                 
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
@endsection