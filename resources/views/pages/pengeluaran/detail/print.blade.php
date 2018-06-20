@extends('layouts.app')

@php
  $no = 0;
  $setting = \App\Models\Instansi::where('status', 1)->first();
//   $dt = new \Carbon\Carbon($data->tanggal);
// 	setlocale(LC_TIME, 'IND');
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
                    <table width="71%" border="0">
                        <tbody>
                        <tr>
                            <td colspan="3">PERINCIAN BIAYA PERJALANAN DINAS </td>
                        </tr>
                        <tr>
                            <td width="151">Lampiran SPPD No </td>
                            <td width="19">: </td>
                            <td width="531">-</td>
                        </tr>
                        <tr>
                            <td>Tanggal </td>
                            <td> :</td>
                            <td>12 February s/d 04 Maret 2018 </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <table width="92%" border="1">
                        <tbody>
                        <tr>
                            <td width="20">No </td>
                            <td colspan="5"  align="center">Perincian Biaya </td>
                            <td width="114">Jumlah </td>
                            <td width="378"> Keterangan</td>
                        </tr>
                        <tr>
                            <td> 1.</td>
                            <td colspan="5">Uang Harian </td>
                            <td>Rp519.000 </td>
                            <td rowspan="8"><p>Tanggal : 12 Feb s/d 04 Maret 2018<br>
                            Ke : Bandung<br>
                            Acara : Mengikuti Pendidikan dan Pelatihan Kepemimpinan Tingkat IV Angkatan I bertempat di Bandung </p></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td width="126">Golongan III </td>
                            <td width="35">1 </td>
                            <td width="71"> Hari</td>
                            <td width="8"> x</td>
                            <td width="113">Rp519.000 </td>
                            <td>Rp519.000 </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>Representatif </td>
                            <td>- </td>
                            <td>- </td>
                            <td>x </td>
                            <td>- </td>
                            <td> -</td>
                        </tr>
                        <tr>
                            <td> 2.</td>
                            <td colspan="5"> Biaya Transport</td>
                            <td>Rp248.000 </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>Bensin </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>Rp248.000 </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>3. </td>
                            <td>Biaya Penginapan </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>- </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>Bandung </td>
                            <td> -</td>
                            <td>Hari </td>
                            <td>x </td>
                            <td>- </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="6"  align="center">Jumlah </td>
                            <td>Rp767.000 </td>
                        </tr>
                        </tbody>
                    </table>
            
                </div>
                <br>
                <div>
                    <table width="77%" border="0">
                        <tbody>
                        <tr>
                            <td width="285">Telah dibayarkan uang sejumlah : </td>
                            <td width="152">&nbsp;</td>
                            <td width="248"> Telah diterima uang sejumlah</td>
                        </tr>
                        <tr>
                            <td> Rp767.000</td>
                            <td>&nbsp;</td>
                            <td>Rp767.000 </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <div>
                    <table width="77%" border="0">
                        <tbody>
                        <tr>
                            <td width="251">Bendahara Pengeluaran </td>
                            <td width="253">&nbsp;</td>
                            <td width="253"> Yang Menerima</td>
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
                            <td> MEISARI, SE</td>
                            <td>&nbsp;</td>
                            <td>ANDI WIBOWO, S.Sos, M.Si</td>
                        </tr>
                        <tr>
                            <td>NIP 198405072010012012 </td>
                            <td>&nbsp;</td>
                            <td>NIP 198312292009021003 </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <div>
                    <table width="86%" border="0">
                        <tbody>
                        <tr>
                            <td width="510">&nbsp;</td>
                            <td width="332" align="center">Mengetahui / Menyetujui : </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">Kepala Dinas Komunikasi Informatika dan Statistik Kota Cirebon </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">IING DAIMAN, S.Ip, M.Si </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">NIP 196808221997031003 </td>
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