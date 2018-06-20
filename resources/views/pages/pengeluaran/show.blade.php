@extends('layouts.app')

@php
  $no = 0;
  $setting = \App\Models\Instansi::where('status', 1)->first();
  $dt = new \Carbon\Carbon($data->tanggal);
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
                            <td align="center"><strong>Nomor: 090/II-DKIS/2018</strong></td>
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
                        <td width="625">Bendahara Pengeluaran</td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>
                        <td>Uang Sejumlah</td>
                        <td>:</td>
                        <td>Rp767.000</td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>
                        <td>Terbilang</td>
                        <td>:</td>
                        <td>Tujuh Ratus Enam Puluh Tujuh Ribu Rupiah</td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>
                        <td>Untuk Keperluan</td>
                        <td>:</td>
                        <td>Biaya Perjalanan Dinas Ke Bandung Tanggal 12 Feb s/d 04 Maret 2018</td>
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
                        <td width="409">-</td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>
                        <td>Obyek Belanja</td>
                        <td>:</td>
                        <td>-</td>
                        </tr>
                        <tr>
                        <td>&nbsp;</td>
                        <td>Rincian Belanja</td>
                        <td>:</td>
                        <td>-</td>
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
                        <td align="center">Cirebon, 15 Maret 2019 </td>
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
                        <td align="center">IING DAIMAN, S.Ip, M.Si </td>
                        <td align="center">MEISARI, SE </td>
                        <td align="center">ANDI WIBOWO, S.Sos, M.Si </td>
                        </tr>
                        <tr>
                        <td align="center">NIP 196808221997031003 </td>
                        <td align="center">NIP 198405072010012012 </td>
                        <td align="center">NIP 198312202009021003 </td>
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