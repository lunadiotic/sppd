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
                <hr style="border-width:5px;  
                border-top-style:double;">
                <div>
                    <table width="100%" border="0">
                      <tbody>
                        <tr>
                          <td colspan="4" align="center"><strong><u>SURAT PERINTAH</u></strong></td>
                        </tr>
                        <tr>
                          <td colspan="4" align="center">Nomor : {{ $data->nomor }}</td>
                        </tr>
                        <tr>
                          <td width="16">&nbsp;</td>
                          <td width="68">&nbsp;</td>
                          <td width="8">&nbsp;</td>
                          <td width="605">&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="4">Yang bertanda tangan di bawah ini : </td>
                        </tr>
                        <tr>
                          <td colspan="2">Nama </td>
                          <td>: </td>
                          <td><strong>{{ $data->pegawai->nama }}</strong></td>
                        </tr>
                        <tr>
                          <td colspan="2"> NIP</td>
                          <td> :</td>
                          <td>{{ $data->pegawai->nip }} </td>
                        </tr>
                        <tr>
                          <td colspan="2">Jabatan </td>
                          <td>: </td>
                          <td>{{ ucwords(strtolower($data->pegawai->jabatan)) }}</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td colspan="4" align="center"><strong>MEMERINTAHKAN</strong></td>
                        </tr>
                        <tr>
                          <td colspan="4"><strong>Kepada :</strong></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        @foreach ($data->sppd as $row) <?php $no++  ?>
                          <tr>
                            <td>{{ $no }}. </td>
                            <td>Nama </td>
                            <td>: </td>
                            <td><strong>{{ $row->pegawai->nama }}</strong></td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>NIP </td>
                            <td>: </td>
                            <td>{{ $row->pegawai->nip }}</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>Jabatan </td>
                            <td>: </td>
                            <td>{{ ucwords(strtolower($row->pegawai->jabatan)) }}</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
                <div>
                    <table width="100%" border="0">
                      <tbody>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td><strong>Untuk :</strong></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>{!! $data->uraian !!}</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>Demikian surat Perintah tugas ini kami buat, agar dilaksanakan penuh rasa tanggung jawab dan melaporkan hasilnya. </td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
                <div>
                    <table width="100%" height="276" border="0">
                      <tbody>
                        <tr>
                          <td width="319" height="18">&nbsp;</td>
                          <td width="74">&nbsp;</td>
                          <td width="143">Ditetapkan Di </td>
                          <td width="158">: Cirebon </td>
                        </tr>
                        <tr>
                          <td height="18">&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>Pada Tanggal </td>
                          <td>: {{ $dt->formatLocalized('%d %B %Y') }}</td>
                        </tr>
                        <tr>
                          <td height="18" colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="18">&nbsp;</td>
                          <td colspan="3" align="center"><strong>{{ $data->pegawai->jabatan }}</strong></td>
                        </tr>
                        <tr>
                          <td height="76" colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="18">&nbsp;</td>
                          <td colspan="3" align="center"><strong><u>{{ $data->pegawai->nama }}</u></strong></td>
                        </tr>
                        <tr>
                          <td height="18">&nbsp;</td>
                          <td colspan="3" align="center">{{ $data->pegawai->pangkat }}/{{ $data->pegawai->golongan }}</td>
                        </tr>
                        <tr>
                          <td height="18">&nbsp;</td>
                          <td colspan="3" align="center">NIP. {{ $data->pegawai->nip }} </td>
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