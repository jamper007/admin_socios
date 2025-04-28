@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header"><h2>Modificar Socio</h2></div>
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
            
            <form action="{{ route('socios.update', $socio) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="num_socio">Numero de socio</label>
                        <input class="form-control" type="text" name="num_socio" id="num_socio" value="{{ old('num_socio', $socio->num_socio) }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="nombre">Nombres</label>
                        <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', $socio->nombre) }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="apellido">Apellidos</label>
                        <input class="form-control" type="text" name="apellido" id="apellido" value="{{ old('apellido', $socio->apellido) }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="dni">DNI</label>
                        <input class="form-control" type="number" name="dni" id="dni" value="{{ old('dni', $socio->dni) }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="telefono">Telefono</label>
                        <input class="form-control" type="text" name="telefono" id="telefono" value="{{ old('telefono', $socio->telefono) }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="direccion">Direccion</label>
                        <input class="form-control" type="text" name="direccion" id="direccion" value="{{ old('direccion', $socio->direccion) }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" type="text" name="email" id="email" value="{{ old('email', $socio->email) }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="fecha_nacimiento">Fecha de nacimiento</label>
                        <input class="form-control" type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $socio->fecha_nacimiento) }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="fecha_ingreso">Fecha de inscripcion</label>
                        <input class="form-control" type="date" name="fecha_ingreso" id="fecha_ingreso" value="{{ old('fecha_ingreso', $socio->fecha_ingreso) }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="imagen">Foto del socio</label>
                        <br>
                        @if ($socio->imagen)
                            <img src="{{ asset('storage/imagenes/' . $socio->imagen) }}" alt="Foto de {{ $socio->nombre }}" width="100">
                        @else
                            No hay foto disponible
                        @endif
                        <br>
                        <input class="form-control mt-2" type="file" name="imagen" id="imagen" value="{{ old('imagen', $socio->imagen) }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="estado">Estado</label>
                        <select class="form-control" name="estado" id="estado" required>
                            <option value="activo" {{ old('estado', $socio->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ old('estado', $socio->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i><i class="fa fa-save"></i> Guardar
                        </button>
                        <a href="{{ url('socios/') }}" class="btn btn-success"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection