<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
    {!! Form::label('nama', 'Nama Biaya') !!}
    {!! Form::text('nama', null, ['class' => 'form-control', 'required' => 'required', 'autofocus']) !!}
    <small class="text-danger">{{ $errors->first('nama') }}</small>
</div>
<div class="form-group">
    <label>Aktif ?</label>
    <div class="mt-radio-inline">
        <label class="mt-radio">
            <input type="radio" name="status" id="status_1" value=1 {{ (old('status') == 1) ? 'checked' : '' }}/> Ya
            <span></span>
        </label>
        <label class="mt-radio">
            <input type="radio" name="status" id="status_1" value=0 {{ (old('status') == 0) ? 'checked' : '' }}/> Tidak
            <span></span>
        </label>
    </div>
</div>
