@extends('layouts.app')

@php
    $dana = 0;
    $saldo = 0;
    $used = 0;
    $sppd = 0;
    if (\App\Models\Anggaran::where('tahun', '=', date('Y'))) {
        $dana = \App\Models\Anggaran::where('tahun', '=', date('Y'))->sum('dana');
    }
    if (\App\Models\Transaksi::select('saldo')->whereYear('tanggal', date('Y'))->orderBy('id', 'DESC')->first()) {
        $saldo = \App\Models\Transaksi::select('saldo')->whereYear('tanggal', date('Y'))->orderBy('id', 'DESC')->first()->saldo;
    }
    if (\App\Models\Transaksi::whereYear('tanggal', date('Y'))->orderBy('id', 'DESC')) {
        $used = \App\Models\Transaksi::whereYear('tanggal', date('Y'))->orderBy('id', 'DESC')->sum('out');
    }
    if (\App\Models\Sppd::whereYear('tanggal_berangkat', date('Y'))->orderBy('id', 'DESC')) {
        $sppd = \App\Models\Sppd::whereYear('tanggal_berangkat', date('Y'))->orderBy('id', 'DESC')->count();
    }
@endphp

@section('content')
<div class="page-content-wrapper">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->
        <div class="theme-panel hidden-xs hidden-sm">
            <div class="toggler"> </div>
            <div class="toggler-close"> </div>
        </div>
        <!-- END THEME PANEL -->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ url('/home') }}">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Dashboard</span>
                </li>
            </ul>
            <div class="page-toolbar">
                <div class="btn-group pull-right">
                    <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li>
                            <a href="#">
                                <i class="icon-bell"></i> Action</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-shield"></i> Another action</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-user"></i> Something else here</a>
                        </li>
                        <li class="divider"> </li>
                        <li>
                            <a href="#">
                                <i class="icon-bag"></i> Separated link</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Dashboard
            <small>Home Admin</small>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-green-sharp">
                                <span data-counter="counterup" data-value="7800">{{ Money::rupiah($dana) }}</span>
                                <small class="font-green-sharp">IDR </small>
                            </h3>
                            <small>Anggaran Tahun {{ date('Y') }}</small>
                        </div>
                        <div class="icon">
                            <i class="icon-pie-chart"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-red-haze">
                                <span data-counter="counterup" data-value="7800">{{ Money::rupiah($saldo) }}</span>
                                <small class="font-green-sharp">IDR</small>
                            </h3>
                            <small>Saldo</small>
                        </div>
                        <div class="icon">
                            <i class="icon-like"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-blue-sharp">
                                <span data-counter="counterup" data-value="7800">{{ Money::rupiah($used) }}</span>
                                <small class="font-green-sharp">IDR</small>
                            </h3>
                            <small>Digunakan</small>
                        </div>
                        <div class="icon">
                            <i class="icon-basket"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-purple-soft">
                                <span data-counter="counterup" data-value="7800">{{ $sppd }}</span>
                                <small class="font-green-sharp"></small>
                            </h3>
                            <small>Jumlah SPPD</small>
                        </div>
                        <div class="icon">
                            <i class="icon-user"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet box blue-hoki">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Dashboard
                        </div>
                    </div>
                    <div class="portlet-body">
                        <h2>Selamat Datang, Admin</h2>
                    </div>
                </div>
                <!-- END Portlet PORTLET-->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
@endsection
