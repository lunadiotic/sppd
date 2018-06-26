@extends('layouts.app')

@push('styles')
    <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
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
                    <a href="#">Tables</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Datatables</span>
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
        <h1 class="page-title"> Bukti Pengeluaran
            <small>Data Table</small>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">Data</span>
                        </div>
                        <div class="actions">
                            <a href="{{ route('admin.pengeluaran.detail.print', $id) }}" class="btn green btn-outline">
                                <i class="fa fa-plus"></i> Print 
                            </a>
                            @php
                                $sppd = \App\Models\Sppd::find($id);
                            @endphp
                            @if ($sppd->status == 0)
                                <a href="{{ route('admin.pengeluaran.detail.complete', $id) }}" class="btn blue btn-outline">
                                    <i class="fa fa-check"></i> Selesai 
                                </a>
                                <a href="{{ route('admin.pengeluaran.detail.create', $id) }}" class="btn blue btn-outline">
                                    <i class="fa fa-plus"></i> Add 
                                </a>
                            @endif
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="dataTable">
                            <thead>
                                <tr>
                                    <th class="">id</th>
                                    <th class="">Uraian</th>
                                    <th class="">Jenis</th>
                                    <th class="">Biaya</th>
                                    <th class="">Banyaknya</th>
                                    <th class="">Total</th>
                                    <th class=""></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('table.pengeluaran.detail', $id) }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'uraian', name: 'uraian'},
                {data: 'biaya.nama', name: 'biaya.nama'},
                {data: 'harga', name: 'harga'},
                {data: 'qty', name: 'qty'},
                {data: 'total', name: 'total'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    </script>
@endpush