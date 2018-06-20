@extends('layouts.app')

@php
  $no = 0;
  $setting = \App\Models\Instansi::where('status', 1)->first();
  $dt = new \Carbon\Carbon($data->created_at);
  $tanggal_berangkat = new \Carbon\Carbon($data->tanggal_berangkat);
  $tanggal_kembali = new \Carbon\Carbon($data->tanggal_kembali);
  $lamanya = $tanggal_berangkat->diffInDays($tanggal_kembali);
  setlocale(LC_TIME, 'IND');
  $pengikut = [];
  if(!empty($data->pengikut)) {
    $data_pengikut = explode(',', $data->pengikut);
    $pengikut = array_chunk($data_pengikut,3);
  }
@endphp

@push('styles')
    <style>
      .invoice {
        font-family: 'Times New Roman', Times, serif;
        font-size: 100%;
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
                              <td width="266" rowspan="6"><img src="{{ asset($setting->logo) }}" width="104" height="100" alt=""/></td>
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
                            <tr>
                              <td align="center"><strong><u>SURAT PERINTAH PERJALANAN DINAS</u></strong></td>
                            </tr>
                            <tr>
                              <td align="center"><strong>Nomor: {{ $data->nomor }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <table width="100%" border="1">
                      <tbody>
                        <tr>
                          <td width="16"> 1</td>
                          <td width="295">Pejabat berwanang yang memberi perintah </td>
                          <td colspan="2">{{ ucwords(strtolower($data->surat->pegawai->jabatan)) }}</td>
                          </tr>
                        <tr>
                          <td>2 </td>
                          <td>Nama pegawai yang diperintah </td>
                          <td colspan="2">{{ $data->pegawai->nama }}</td>
                          </tr>
                        <tr>
                          <td rowspan="2">3 </td>
                          <td>a. Pangkat dan Golongan </td>
                          <td colspan="2">a. {{ $data->pegawai->pangkat }}, {{ $data->pegawai->golongan }} </td>
                          </tr>
                        <tr>
                          <td>b. Jabatan </td>
                          <td colspan="2">b. {{ $data->pegawai->jabatan }} </td>
                          </tr>
                        <tr>
                          <td>4 </td>
                          <td>Maksud Perjalanan </td>
                          <td colspan="2">{{ $data->perjalanan }}</td>
                          </tr>
                        <tr>
                          <td>5 </td>
                          <td> a. Tempat berangkat<br>
                            b. Tempat tujuan<br></td>
                          <td colspan="2"> a. {{ $data->tempat_berangkat }}<br>
                            b. {{ $data->tempat_tujuan }}<br></td>
                          </tr>
                        <tr>
                          <td> 6</td>
                          <td>
                              a. Lamanya perjalanan dinas <br>
                              b. Tanggal Keberangkatan <br>
                              c. Tanggal harus kembali
                            </td>
                          <td colspan="2">a. {{ $lamanya }} hari<br>
                            b. {{ $tanggal_berangkat->formatLocalized('%d %B %Y') }}<br>
                            c. {{ $tanggal_kembali->formatLocalized('%d %B %Y') }}<br></td>
                          </tr>
                        <tr>
                          <td>7 </td>
                          <td>Alat anguktan yang dipergunakan </td>
                          <td colspan="2">Dinas / Umum </td>
                          </tr>
                        <tr>
                          <td>8 </td>
                          <td>Pengikut : Nama </td>
                          <td width="67">Umur </td>
                          <td width="468">Hubungan Kekeluargaan </td>
                        </tr>
                        @if ($pengikut)
                          @foreach ($pengikut as $row) <?php $no++  ?>
                          <tr>
                              <td>&nbsp;</td>
                              <td>{{ $no }}. {{ $row[0] }}</td>
                              <td>{{ $row[1] }}</td>
                              <td>{{ $row[2] }}</td>
                          </tr>
                          @endforeach
                        @else
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                        @endif
                        <tr>
                          <td> 9</td>
                          <td>Pembebasan<br>
                            a. Instansi<br>
                            b. Mata Anggaran<br></td>
                          <td colspan="2">a. Dinas Komunikasi, Informatika dan Statistik Cirebon<br>
                            b.<br></td>
                          </tr>
                        <tr>
                          <td> 10</td>
                          <td>Keterangan Lain-lain</td>
                          <td colspan="2">{{ $data->keterangan }}</td>
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
                          <td width="143">Dikeluarkan Di </td>
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
                          <td colspan="3" align="center"><strong>{{ $data->surat->pegawai->jabatan}}</strong></td>
                        </tr>
                        <tr>
                          <td height="76" colspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                          <td height="18">&nbsp;</td>
                          <td colspan="3" align="center"><strong><u>{{ $data->surat->pegawai->nama }}</u></strong></td>
                        </tr>
                        <tr>
                          <td height="18">&nbsp;</td>
                          <td colspan="3" align="center">{{ $data->surat->pegawai->pangkat }}/{{ $data->surat->pegawai->golongan }}</td>
                        </tr>
                        <tr>
                          <td height="18">&nbsp;</td>
                          <td colspan="3" align="center">NIP. {{ $data->surat->pegawai->nip }} </td>
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