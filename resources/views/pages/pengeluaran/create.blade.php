@extends('layouts.app')

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
                    <span>Form</span>
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
        <h1 class="page-title"> Form
            <small>Form Input</small>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-8 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> Form</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        {!! Form::open(['method' => 'POST', 'route' => 'admin.pengeluaran.store', 'files' => true]) !!}
                            <div class="form-body">
                                @include('pages.pengeluaran._form')
                            </div>
                            <div class="form-actions right">
                                <a href="{{ url()->previous() }}" class="btn default">Cancel</a>
                                <button type="submit" class="btn green">Submit</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('.date-picker').datepicker({
                orientation: "left",
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                autoclose: true
            });    
            $("#btn1").click(function(){
                $("#relation").append('<div class="row"><div class="col-md-5"><div class="form-group"><label for="pengikut[]">Nama</label><input class="form-control" required="required" name="pengikut[]" type="text" id="pengikut[]"><small class="text-danger"></small></div></div><div class="col-md-2"><div class="form-group"><label for="pengikut[]">Umur</label><input class="form-control" required="required" name="pengikut[]" type="text" id="pengikut[]"><small class="text-danger"></small></div></div><div class="col-md-5"><div class="form-group"><label for="pengikut[]">Hubungan Keluarga</label><input class="form-control" required="required" name="pengikut[]" type="text" id="pengikut[]"><small class="text-danger"></small></div></div></div>');
            });
        });
    </script>
    <script>
        $(".select2surat").select2({        
                    ajax: {
                        url: "/api/select/sppd",
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                q: params.term // search term
                            };
                        },
                        processResults: function (data) {
                            // parse the results into the format expected by Select2.
                            // since we are using custom formatting functions we do not need to
                            // alter the remote JSON data
                            return {
                                results:  $.map(data, function (item) {
                                    return {
                                        text: item.nomor,
                                        id: item.id
                                    }
                                })

                            };
                        },
                        cache: true
                    },
                    // minimumInputLength: 2
                    escapeMarkup: function(markup) {
                        return markup;
                    },
                    multiple: true,
                    allowClear: true,
                    placeholder: 'Ketik untuk mencari nomor sppd',
                    minimumInputLength: 2,
            });
    </script>
@endpush