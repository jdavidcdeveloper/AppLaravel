<h1>{{$mode}} empleado</h1>

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>
</div>
@endif

<div class="form-group">
    <br>
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" id="nombre"
        value="{{isset($empleado->nombre)?$empleado->nombre:old('nombre')}}"> <br>
</div>

<div class="form-group">
    <label for="primer_apellido">Primer apellido</label>
    <input type="text" class="form-control" name="primer_apellido" id="primer_apellido"
        value="{{isset($empleado->primer_apellido)?$empleado->primer_apellido:old('primer_apellido')}}"><br>
</div>

<div class="form-group">
    <label for="segundo_apellido">Segundo apellido</label>
    <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido"
        value="{{isset($empleado->segundo_apellido)?$empleado->segundo_apellido:old('segundo_apellido')}}"><br>
</div>

<div class="form-group">
    <label for="correo">Correo</label>
    <input type="email" class="form-control" name="correo" id="correo"
        value="{{isset($empleado->correo)?$empleado->correo:old('correo')}}"><br>
</div>

<div class="form-group">
    <label for="foto">Imagen</label>
    @if(isset($empleado->foto))
    <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$empleado->foto}}" width="100" alt="">
    @endif
    <input type="file" class="form-control" name="foto" id="foto" value=""><br> <br>
</div>

<input class="btn btn-success" type="submit" value="{{$mode}} datos">
<a class="btn btn-primary" href="{{url('empleado/')}}">Regresar</a>