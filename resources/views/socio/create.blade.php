@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header"><h2>Nuevo Socio</h2></div>
        
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Por favor corrige los siguientes errores:</strong>
                <br><br>
                <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif

            <form action="{{route('socios.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="num_socio" class="form-label">Numero de socio</label>
                        <input class="form-control" type="text" name="num_socio" id="num_socio" value="{{old('num_socio')}}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="form-label">Nombres</label>
                        <input class="form-control" type="text" name="nombre" id="nombre" value="{{old('nombre')}}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="apellido" class="form-label">Apellidos</label>
                        <input class="form-control" type="text" name="apellido" id="apellido" value="{{old('apellido')}}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input class="form-control" type="number" name="dni" id="dni" value="{{old('dni')}}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input class="form-control" type="text" name="telefono" id="telefono" value="{{old('telefono')}}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="direccion" class="form-label">Direccion</label>
                        <input class="form-control" type="text" name="direccion" id="direccion" value="{{old('direccion')}}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="text" name="email" id="email" value="{{old('email')}}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                        <input class="form-control" type="date" name="fecha_nacimiento" id="fecha_nacimiento"
                            value="{{old('fecha_nacimiento')}}"  
                            min="{{ date('Y-m-d', strtotime('-120 years')) }}" 
                            max="{{ date('Y-m-d') }}" 
                            required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="fecha_ingreso" class="form-label">Fecha de inscripcion</label>
                        <input class="form-control" type="date" name="fecha_ingreso" id="fecha_ingreso" 
                            value="{{old('fecha_ingreso')}}" 
                            min="{{ date('Y-m-d', strtotime('-46 years')) }}" 
                            max="{{ date('Y-m-d') }}"
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="imagen" class="form-label">Foto</label>
                        <input class="form-control" type="file" name="imagen" id="imagen" value="{{old('imagen')}}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-control" name="estado" id="estado" required>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-save"></i> Guardar
                        </button>
                        
                        <a class="btn btn-success" class="nav-link"
                         href="{{ url('/fotos/captura') }}">{{ __('Tomar Fotos') }}
                        </a> 

                        <a class="btn btn-info" href="{{ url('socios/') }}"> 
                            <i class="fa fa-arrow-left"></i> Regresar
                        </a>                     
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection