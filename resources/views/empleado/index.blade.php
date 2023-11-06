<!-- Estas 3 primeras se extraen del layout app.blade para tomar la plantilla de laravel -->
@extends('layouts.app')
@section('content')

<div class="container">

    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" id="alerta" role="alert">
        {{ Session::get('mensaje') }}

    </div>
    @endif

    <script>
    // Agregar código JavaScript para cerrar la alerta después de 7 segundos
    setTimeout(function() {
        document.getElementById('alerta').style.display = 'none';
    }, 7000); // 7000 milisegundos = 7 segundos
    </script>

    <a href="{{url('empleado/create')}}" class="btn btn-success">REGISTRAR NUEVO EMPLEADO</a> <br> <br>
    <div class="table-responsive">
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">foto</th>
                    <th scope="col">nombre</th>
                    <th scope="col">primer_apellido</th>
                    <th scope="col">segundo_apellido</th>
                    <th scope="col">correo</th>
                    <th scope="col">acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                <tr class="">
                    <td scope="row">{{$empleado->id}}</td>
                    <td>
                        <!-- Ruta para ingresar a la carpeta de imagenes -->
                        <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$empleado->foto}}" width="100"
                            alt="">
                    </td>
                    <td>{{$empleado->nombre}}</td>
                    <td>{{$empleado->primer_apellido}}</td>
                    <td>{{$empleado->segundo_apellido}}</td>
                    <td>{{$empleado->correo}}</td>
                    <td>
                        <a href="{{url('/empleado/'.$empleado->id.'/edit')}}" class="btn btn-warning">
                            Editar
                        </a>
                        |
                        <form action="{{url('/empleado/'.$empleado->id)}}" class="d-inl" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <input class="btn btn-danger" type="submit"
                                onclick="return confirm ('¿Está seguro de borrar el siguiente dato?')" value="Borrar">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $empleados->links() !!}
    </div>
</div>
@endsection