@extends('layouts.app')

@section('content')


<div class="container">
    <div class="card">
        <div class="card-header"><h3>Listado de Socios</h3></div>
        <div class="card-body">
            <a href="{{ url('socios/create') }}" class="btn btn-success">
            <i class="fa fa-book"></i>
            Nuevo Socio <a/>
            <br>
            <br>
            <table border="1" class="table" >
    
            <tr>
            <th>Numero de socio</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Email</th>
            <th>Fecha de nacimiento</th>
            <th>Fecha de inscripcion</th>
            <th>Estado</th>
            <th>Foto</th>
            <th>Acciones</th>
            </tr>
 
    
            @foreach ($MostrarSocios as $socio )
            <tr>
    
            <td>
            {{ $socio->num_socio}} 
            </td>
            <td>
            {{ucwords( $socio->nombre)}}
            </td>
            <td>
            {{ucwords( $socio->apellido )}}
            </td>
            <td>
            {{ $socio->dni }}
            </td>
            <td>
            {{ $socio->telefono }}
            </td>
            <td>
         {{ucwords( $socio->direccion) }}
            </td>
            <td>
            {{ $socio->email }}
            </td>
            <td>
         {{ $socio->fecha_nacimiento }}
            </td>
            <td>
            {{ $socio->fecha_ingreso }}
            </td>
            <td>
            {{ ucfirst($socio->estado) }}
            </td>
            <td>
        
            @if ($socio->imagen)
            <img src="{{ asset('storage/imagenes/' . $socio->imagen) }}" alt="Foto de {{ $socio->nombre }}" width="50">
            @else
            No hay foto disponible
            @endif

            </td>
            <td>
            <div class="btn-group" role="group">
                <a href="{{ route('socios.show', $socio) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>Ver</a>
                <a href="{{ route('socios.edit', $socio) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Editar</a>
                <form action="{{ route('socios.destroy', $socio->id) }}" method="POST" class="d-inline-">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"></i><i class="fa fa-trash"></i>Eliminar</button>
                </form>
            </div>
            </td>

            @endforeach
            </table>
            {!! $MostrarSocios->Links() !!}
        </div>
   
    </div>
    
</div>



   


@endsection



