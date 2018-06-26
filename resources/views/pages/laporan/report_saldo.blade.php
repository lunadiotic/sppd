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
                            <td align="center"><strong>Laporan Sisa Saldo</strong></td>
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
                    <table width="59%" border="0">
                        <tbody>
                        <tr>
                            <td width="50">&nbsp;</td>
                            <td width="716" align="right">Total Anggaran : </td>
                            <td width="111" align="right">Rp{{ Money::rupiah($data['total_anggaran']) }}</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td align="right">Total SPPD : </td>
                            <td align="right">Rp{{ Money::rupiah($data['total_sppd']) }}</td>
                        </tr>
                            <tr>
                            <td>&nbsp;</td>
                            <td align="right">Sisa : </td>
                            <td align="right">Rp{{ Money::rupiah($data['sisa']) }}</td>
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