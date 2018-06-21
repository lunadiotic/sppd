<div id="form-sppd">
    <div class="form-group{{ $errors->has('sppd_id') ? ' has-error' : '' }}">
        {!! Form::label('sppd_id', 'Nomor SPPD') !!}
        <select class="select2surat form-control" name="sppd_id">
        @if (!empty($data->sppd))
            <option value="{{ $data->sppd['id'] }}" selected>{{ $data->sppd['nomor'] }}</option>
        @endif
        </select>
        {{-- {!! Form::select('pegawai_id', $pegawai, null, ['id' => 'pegawai_id', 'class' => 'form-control select2', 'required' => 'required']) !!} --}}
        <small class="text-danger">{{ $errors->first('sppd_id') }}</small>
    </div>
    <div class="form-group{{ $errors->has('nomor') ? ' has-error' : '' }}">
        {!! Form::label('nomor', 'Nomor Bukti Pengeluaran') !!}
        {!! Form::text('nomor', null, ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('nomor') }}</small>
    </div>
    <div class="form-group{{ $errors->has('sumber_dana') ? ' has-error' : '' }}">
        {!! Form::label('sumber_dana', 'Terima Dari') !!}
        {!! Form::text('sumber_dana', null, ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('sumber_dana') }}</small>
    </div>
    <div class="form-group{{ $errors->has('keperluan') ? ' has-error' : '' }}">
        {!! Form::label('keperluan', 'Untuk Keperluan') !!}
        {!! Form::text('keperluan', null, ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('keperluan') }}</small>
    </div>
    <div class="form-group{{ $errors->has('belanja_jenis') ? ' has-error' : '' }}">
        {!! Form::label('belanja_jenis', 'Jenis Belanja') !!}
        {!! Form::text('belanja_jenis', '-', ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('belanja_jenis') }}</small>
    </div>
    <div class="form-group{{ $errors->has('belanja_obyek') ? ' has-error' : '' }}">
        {!! Form::label('belanja_obyek', 'Obyek Belanja') !!}
        {!! Form::text('belanja_obyek', '-', ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('belanja_obyek') }}</small>
    </div>
    <div class="form-group{{ $errors->has('belanja_rincian') ? ' has-error' : '' }}">
        {!! Form::label('belanja_rincian', 'Rincian Belanja') !!}
        {!! Form::text('belanja_rincian', '-', ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('belanja_rincian') }}</small>
    </div>
    <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
        {!! Form::label('keterangan', 'Keterangan') !!}
        {!! Form::textarea('keterangan', null, ['class' => 'form-control', 'rows' => '3', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('keterangan') }}</small>
    </div>
    <div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}">
        {!! Form::label('tanggal', 'Tanggal') !!}
        <div class="input-group date date-picker" data-date-format="yyyy-mm-dd">
            {!! Form::text('tanggal', null, ['class' => 'form-control', 'required' => 'required', 'readonly' => 'readonly']) !!}
            <span class="input-group-btn">
                <button class="btn default" type="button">
                    <i class="fa fa-calendar"></i>
                </button>
            </span>
            <small class="text-danger">{{ $errors->first('tanggal') }}</small>
        </div>
    </div>
</div>