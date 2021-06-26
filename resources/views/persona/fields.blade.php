<!-- Tie Razon Social Field -->
<div class="form-group col-sm-6">
    {!! Form::label('per_cedula', 'Cedula:') !!}
    {!! Form::text('per_cedula', null, ['class' => 'form-control','required'=>'required ']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('per_apellidos', 'Apellidos:') !!}
    {!! Form::text('per_apellidos', null, ['class' => 'form-control','required'=>'required ']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('per_nombres', 'Nombres:') !!}
    {!! Form::text('per_nombres', null, ['class' => 'form-control','required'=>'required ']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('per_direccion', 'Direccion:') !!}
    {!! Form::text('per_direccion', null, ['class' => 'form-control','required'=>'required ']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('per_telefono', 'Telefono:') !!}
    {!! Form::text('per_telefono', null, ['class' => 'form-control','required'=>'required ']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('per_sexo', 'Sexo:') !!}
    {!! Form::select('per_sexo',['MUJER'=>'Mujer','HOMBRE'=>'Hombre'] ,null, ['class' => 'form-control','required'=>'required ']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('per_usuario', 'Usuario:') !!}
    {!! Form::text('per_usuario', null, ['class' => 'form-control','required'=>'required ']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Clave:') !!}
<input type="password" class="form-control" name="password" id="password" required="">
</div>
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','required'=>'required ']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('per_tipo', 'Tipo:') !!}
    {!! Form::select('per_tipo', ['A'=>'Administrador','U'=>'Usuario','C'=>'Cliente'],null, ['class' => 'form-control','required'=>'required ']) !!}
</div>


<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('persona.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
