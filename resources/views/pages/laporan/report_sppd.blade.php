@extends('layouts.app')

@php
  $no = 1;
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
                    <table width="100%" border="0">
                      <tbody>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="center">Laporan Anggaran Perjalanan Dinas</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align="center">{{ $data['tanggal'] }}</td>
                          <td>&nbsp;</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
                <br>
                <div>
                    <table width="100%" border="1">
                      <tbody>
                        <tr>
                          <td>No</td>
                          <td>Tanggal</td>
                          <td>No SPPD</td>
                          <td>Tujuan</td>
                          <td>Jumlah Dana</td>
                        </tr>
                        @foreach ($data['sppd_detail'] as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->tanggal_berangkat }}</td>
                                <td><a href="{{ route('admin.sppd.show', $row->id ) }}">{{ $row->nomor }}</a></td>
                                <td>{{ $row->tempat_tujuan }}</td>
                                <td>Rp{{ Money::rupiah($row['pengeluaran']['nominal']) }}</td>
                            </tr>
                        @endforeach
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