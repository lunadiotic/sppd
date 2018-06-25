    <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
        {!! Form::label('nama', 'Nama Instansi') !!}
        {!! Form::text('nama', null, ['class' => 'form-control', 'required' => 'required', 'autofocus']) !!}
        <small class="text-danger">{{ $errors->first('nama') }}</small>
    </div>
    <div class="form-group{{ $errors->has('telepon') ? ' has-error' : '' }}">
        {!! Form::label('telepon', 'Telepon') !!}
        {!! Form::text('telepon', null, ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('telepon') }}</small>
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        {!! Form::label('email', 'Alamat E-Mail') !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'eg: foo@bar.com']) !!}
        <small class="text-danger">{{ $errors->first('email') }}</small>
    </div>
    <div class="form-group{{ $errors->has('situs') ? ' has-error' : '' }}">
        {!! Form::label('situs', 'Situs Instansi') !!}
        {!! Form::text('situs', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('situs') }}</small>
    </div>
    <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
        {!! Form::label('alamat', 'Alamat') !!}
        {!! Form::textarea('alamat', null, ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('alamat') }}</small>
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
    <div class="row">
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                {!! Form::label('logo', 'Logo') !!}
                {!! Form::file('logo') !!}
                <p class="help-block">Masukan Logo Instansi Terkait Untuk di Cetak</p>
                <small class="text-danger">{{ $errors->first('logo') }}</small>
            </div>
        </div>
        <div class="col-md-6">
            @if(!empty($data))
                <img src="{{ asset($data->logo) }}" alt="logo" height="150" width="150">
            @endif
        </div>
    </div>
    