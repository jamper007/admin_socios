
@extends('layouts.app')

@section('content')
<div
    class="container"
>
<div class="card">
    <div class="card-header"><h2>Fotografia del Socio </h2></div>
    <div class="card-body">
    
    </div>
    
<br>
{{ucfirst( old('nombre', $socio->nombre)) }}
 {{ucfirst( old('apellido', $socio->apellido) )}}
<br>
<br>
 
</div>
@if ($socio->imagen)
            <img src="{{ asset('storage/imagenes/' . $socio->imagen) }}"
             alt="Foto de {{ $socio->nombre }}" width="400">
        @else
            No hay foto disponible
    @endif
    <a href="{{ url('socios/') }}" class="btn btn-success"> Regresar </a>
    @endsection
</div>



