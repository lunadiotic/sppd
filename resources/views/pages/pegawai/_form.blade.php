<div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
    {!! Form::label('nip', 'NIP') !!}
    {!! Form::text('nip', null, ['class' => 'form-control', 'required' => 'required', 'autofocus']) !!}
    <small class="text-danger">{{ $errors->first('nip') }}</small>
</div>
<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
    {!! Form::label('nama', 'Nama') !!}
    {!! Form::text('nama', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('nama') }}</small>
</div>
<div class="form-group{{ $errors->has('skpd') ? ' has-error' : '' }}">
    {!! Form::label('skpd', 'SKPD') !!}
    {!! Form::text('skpd', null, ['class' => 'form-control', 'required' => 'required', 'autofocus']) !!}
    <small class="text-danger">{{ $errors->first('skpd') }}</small>
</div>
<div class="form-group{{ $errors->has('pangkat') ? ' has-error' : '' }}">
    {!! Form::label('pangkat', 'Pangkat') !!}
    {!! Form::text('pangkat', null, ['class' => 'form-control', 'required' => 'required', 'autofocus']) !!}
    <small class="text-danger">{{ $errors->first('pangkat') }}</small>
</div>
<div class="form-group{{ $errors->has('golongan') ? ' has-error' : '' }}">
    {!! Form::label('golongan', 'Golongan') !!}
    {!! Form::text('golongan', null, ['class' => 'form-control', 'required' => 'required', 'autofocus']) !!}
    <small class="text-danger">{{ $errors->first('golongan') }}</small>
</div>
<div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
    {!! Form::label('jabatan', 'Jabatan') !!}
    {!! Form::text('jabatan', null, ['class' => 'form-control', 'required' => 'required', 'autofocus']) !!}
    <small class="text-danger">{{ $errors->first('jabatan') }}</small>
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
