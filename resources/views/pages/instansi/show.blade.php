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
                            <span>Tables</span>
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
                <h1 class="page-title"> Show
                    <small>Detail Data</small>
                </h1>
                <!-- END PAGE TITLE-->
                <!-- END PAGE HEADER-->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-comments"></i>Data table </div>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"> </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                    <a href="javascript:;" class="reload"> </a>
                                    <a href="javascript:;" class="remove"> </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-scrollable">
                                    <table width="27%" class="table table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <th width="71" scope="row"> ID</th>
                                                <td width="323">{{ $data->id }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Nama </th>
                                                <td>{{ $data->nama }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Telepon </th>
                                                <td>{{ $data->telepon }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">E-Mail </th>
                                                <td><a href="mailto:{{ $data->email }}">{{ $data->email }}</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Situs </th>
                                                <td><a target="_blank" href="http://{{ $data->situs }}">{{ $data->situs }}</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Alamat </th>
                                                <td>{{ $data->alamat }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Logo </th>
                                                <td><img src="{{ asset($data->logo) }}" alt="logo" height="150" width="150"></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status </th>
                                                <td>{{ $data->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END SAMPLE TABLE PORTLET-->
                    </div>
                </div>
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
@endsection