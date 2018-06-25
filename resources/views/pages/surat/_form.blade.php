@php
    $kadis = \App\Models\Pegawai::where('jabatan', 'KEPALA DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK')->where('status', 1)->pluck('nama', 'id')->all();
    $pegawai = \App\Models\Pegawai::where('jabatan', '!=', 'KEPALA DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK')->where('status', 1)->pluck('nama', 'id')->all();
@endphp

<div class="form-group{{ $errors->has('nomor') ? ' has-error' : '' }}">
    {!! Form::label('nomor', 'Nomor Surat') !!}
    {!! Form::text('nomor', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('nomor') }}</small>
</div>
<div class="form-group{{ $errors->has('pegawai_id') ? ' has-error' : '' }}">
    {!! Form::label('pegawai_id', 'Penanggung Jawab') !!}
    {!! Form::select('pegawai_id', $kadis, null, ['id' => 'pegawai_id', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('pegawai_id') }}</small>
</div>
<div class="form-group{{ $errors->has('pelaksana') ? ' has-error' : '' }}">
    {!! Form::label('pelaksana', 'Pelaksana') !!}
    <select class="select2 form-control" name="pelaksana[]" multiple>
        @if (!empty($data->sppd))
            @foreach ($data->sppd as $row)
                <option value="{{ $row->pegawai->id }}" selected>{{ $row->pegawai->nama }}</option>
            @endforeach
        @endif
    </select>
    {{-- {!! Form::select('pelaksana', $pegawai, null, ['id' => 'pelaksana', 'class' => 'form-control select2', 'required' => 'required']) !!} --}}
    <small class="text-danger">{{ $errors->first('pelaksana') }}</small>
</div>
<div class="form-group{{ $errors->has('uraian') ? ' has-error' : '' }}">
    {!! Form::label('uraian', 'Uraian') !!}
    {!! Form::textarea('uraian', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('uraian') }}</small>
</div>
<div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}">
    {!! Form::label('tanggal', 'Tanggal') !!}
    <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd">
        {!! Form::text('tanggal', null, ['class' => 'form-control', 'required' => 'required', 'readonly' => 'readonly']) !!}
        <span class="input-group-btn">
            <button class="btn default" type="button">
                <i class="fa fa-calendar"></i>
            </button>
        </span>
        <small class="text-danger">{{ $errors->first('tanggal') }}</small>
    </div>
</div>

<div class="form-group">
    <label>Aktif ?</label>
    <div class="mt-radio-inline">
        <label class="mt-radio">
            {{ Form::radio('status', '1') }} Ya
            <span></span>
        </label>
        <label class="mt-radio">
            {{ Form::radio('status', '0') }} Tidak
            <span></span>
        </label>
    </div>
</div>

@push('scripts')
    <script>
    $(document).ready(function () {
        $('.date-picker').datepicker({
            orientation: "left",
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            autoclose: true
        });

        $( ".select2" ).select2({        
                ajax: {
                    url: "/api/select/surat/pegawai",
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
                                    text: item.nama,
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
                placeholder: 'Type for search company categories',
                minimumInputLength: 2,
            });
        });

    </script>
@endpush