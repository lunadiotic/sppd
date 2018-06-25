<div class="form-group{{ $errors->has('tahun') ? ' has-error' : '' }}">
    {!! Form::label('tahun', 'Tahun Anggaran') !!}
    {!! Form::text('tahun', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('tahun') }}</small>
</div>
<div class="form-group{{ $errors->has('dana') ? ' has-error' : '' }}">
    {!! Form::label('dana', 'Nominal Anggaran') !!}
    {!! Form::number('dana', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('dana') }}</small>
</div>
<div class="form-group{{ $errors->has('periode') ? ' has-error' : '' }}">
    {!! Form::label('periode', 'Periode') !!}
    {!! Form::select('periode', ['murni' => 'Murni', 'perubahan' => 'Perubahan'], null, ['id' => 'inputname', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('periode') }}</small>
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