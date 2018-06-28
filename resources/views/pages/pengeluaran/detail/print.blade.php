@extends('layouts.app')

@php
  $no = 0;
  $total = \App\Models\PengeluaranDetail::where('pengeluaran_id', $data['pengeluaran']->id)->sum('total');
  $setting = \App\Models\Instansi::where('status', 1)->first();
//   $dt = new \Carbon\Carbon($data->tanggal);
    $tanggal_berangkat = new \Carbon\Carbon($data['pengeluaran']->sppd->tanggal_berangkat);
    $tanggal_kembali = new \Carbon\Carbon($data['pengeluaran']->sppd->tanggal_kembali);
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
                            <td>{{ $tanggal_berangkat->formatLocalized('%d %b %Y') }} s/d  {{ $tanggal_kembali->formatLocalized('%d %b %Y') }}</td>
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
                        </tr>
                        @foreach (\App\Models\Biaya::where('status', 1)->get() as $biaya)
                        @php
                            $no++;
                        @endphp
                        <tr>
                            <td> {{ $no }}.</td>
                            <td colspan="4">{{ $biaya->nama}} </td>
                            <td> </td>
                            <td rowspan=""></td>
                        </tr>
                            @foreach (\App\Models\PengeluaranDetail::where('biaya_id', $biaya->id)->where('pengeluaran_id', $data['pengeluaran']->id)->get() as $detail)
                            <tr>
                                <td>&nbsp;</td>
                                <td width="126">{{ $detail->uraian }} </td>
                                <td width="35">{{ $detail->qty }} </td>
                                <td width="71"> {{ $detail->satuan }}</td>
                                <td width="8"> x</td>
                                <td width="113">Rp{{ Money::rupiah($detail->harga) }} </td>
                                <td>Rp{{ Money::rupiah($detail->harga*$detail->qty) }} </td>
                            </tr>
                            @endforeach
                        @endforeach
                        <tr>
                            <td colspan="6"  align="center">Jumlah </td>
                            <td>Rp{{ Money::rupiah($total) }} </td>
                        </tr>
                        </tbody>
                    </table>
            
                </div>
                <div>
                    <p>Keterangan : {{ $data['pengeluaran']->keterangan }}</p>
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
                            <td> Rp{{ Money::rupiah($total) }}</td>
                            <td>&nbsp;</td>
                            <td> Rp{{ Money::rupiah($total) }}</td>
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
                            <td>{{ $data['pengeluaran']->sppd->pegawai->nama }}</td>
                        </tr>
                        <tr>
                            <td>NIP 198405072010012012 </td>
                            <td>&nbsp;</td>
                            <td>NIP {{ $data['pengeluaran']->sppd->pegawai->nip }} </td>
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
                            <td align="center">{{ $data['pengeluaran']->sppd->surat->pegawai->jabatan }} </td>
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
                            <td align="center">{{ $data['pengeluaran']->sppd->surat->pegawai->nama }} </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="center">NIP {{ $data['pengeluaran']->sppd->surat->pegawai->nip }} </td>
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