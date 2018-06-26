@extends('layouts.app')

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
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
                            <a href="index.html">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span>Laporan</span>
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
                <h1 class="page-title"> Pilih Laporan
                    <small>Tahunan/Bulan</small>
                </h1>
                <!-- END PAGE TITLE-->
                <!-- END PAGE HEADER-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-red-sunglo">
                                    <i class="icon-settings font-red-sunglo"></i>
                                    <span class="caption-subject bold uppercase"> Laporan Per-Bulan</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                {!! Form::open(['method' => 'POST', 'route' => 'admin.laporan.month']) !!}
                                    <div class="form-body">
                                        <div class="form-group{{ $errors->has('bulan') ? ' has-error' : '' }}">
                                            {!! Form::label('bulan', 'Pilih Bulan dan Tahun') !!}
                                            <div class="input-group date month-picker">
                                                {!! Form::text('bulan', null, ['class' => 'form-control', 'required' => 'required', 'readonly' => 'readonly']) !!}
                                                <span class="input-group-btn">
                                                    <button class="btn default" type="button">
                                                        <i class="fa fa-calendar"></i>
                                                    </button>
                                                </span>
                                                <small class="text-danger">{{ $errors->first('bulan') }}</small>
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                            {!! Form::label('type', 'Jenis Laporan') !!}
                                            {!! Form::select('type', ['sppd' => 'Perjalanan Dinas', 'saldo' => 'Sisa Saldo'], null, ['id' => 'type', 'class' => 'form-control', 'required' => 'required']) !!}
                                            <small class="text-danger">{{ $errors->first('type') }}</small>
                                        </div>
                                    </div>
                                    <div class="form-actions right">
                                        <a href="{{ url()->previous() }}" class="btn default">Cancel</a>
                                        <button type="submit" class="btn green">Submit</button>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-red-sunglo">
                                    <i class="icon-settings font-red-sunglo"></i>
                                    <span class="caption-subject bold uppercase"> Laporan Per-Tahun</span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                {!! Form::open(['method' => 'POST', 'route' => 'admin.laporan.year', 'files' => true]) !!}
                                    <div class="form-body">
                                        <div class="form-group{{ $errors->has('tahun') ? ' has-error' : '' }}">
                                            {!! Form::label('tahun', 'Pilih Tahun') !!}
                                            <div class="input-group date year-picker" data-date-format="yyyy">
                                                {!! Form::text('tahun', null, ['class' => 'form-control', 'required' => 'required', 'readonly' => 'readonly']) !!}
                                                <span class="input-group-btn">
                                                    <button class="btn default" type="button">
                                                        <i class="fa fa-calendar"></i>
                                                    </button>
                                                </span>
                                                <small class="text-danger">{{ $errors->first('tahun') }}</small>
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                            {!! Form::label('type', 'Jenis Laporan') !!}
                                            {!! Form::select('type', ['sppd' => 'Perjalanan Dinas', 'saldo' => 'Sisa Saldo'], null, ['id' => 'type', 'class' => 'form-control', 'required' => 'required']) !!}
                                            <small class="text-danger">{{ $errors->first('type') }}</small>
                                        </div>
                                    </div>
                                    <div class="form-actions right">
                                        <a href="{{ url()->previous() }}" class="btn default">Cancel</a>
                                        <button type="submit" class="btn green">Submit</button>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('.month-picker').datepicker({
                orientation: "bottom",
                format: "mm-yyyy",
                viewMode: "months", 
                minViewMode: "months",
                autoclose: true,
            });
            $('.year-picker').datepicker({
                orientation: "bottom",
                viewMode: "years", 
                minViewMode: "years",
                autoclose: true,
            });
        });
    </script>
@endpush