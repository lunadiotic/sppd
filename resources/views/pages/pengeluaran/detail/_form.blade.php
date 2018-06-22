<div class="form-group{{ $errors->has('biaya_id') ? ' has-error' : '' }}">
    {!! Form::label('biaya_id', 'Jenis Biaya') !!}
    {!! Form::select('biaya_id',\App\Models\Biaya::pluck('nama','id')->all(), null, ['id' => 'biaya_id', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('biaya_id') }}</small>
</div>
<div class="form-group{{ $errors->has('uraian') ? ' has-error' : '' }}">
    {!! Form::label('uraian', 'Uraian') !!}
    {!! Form::text('uraian', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('uraian') }}</small>
</div>
<div class="form-group{{ $errors->has('qty') ? ' has-error' : '' }}">
    {!! Form::label('qty', 'Banyaknya') !!}
    {!! Form::number('qty', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('qty') }}</small>
</div>
<div class="form-group{{ $errors->has('satuan') ? ' has-error' : '' }}">
    {!! Form::label('satuan', 'Nilai Satuan') !!}
    {!! Form::text('satuan', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('satuan') }}</small>
</div>
<div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
    {!! Form::label('harga', 'Nominal') !!}
    {!! Form::number('harga', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('harga') }}</small>
</div>