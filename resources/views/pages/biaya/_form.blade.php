<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
    {!! Form::label('nama', 'Nama Biaya') !!}
    {!! Form::text('nama', null, ['class' => 'form-control', 'required' => 'required', 'autofocus']) !!}
    <small class="text-danger">{{ $errors->first('nama') }}</small>
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
