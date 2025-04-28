@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                
               


<!--contiene las cards -->
<!-- Contenedor de las tarjetas -->
<div class="container mt-4">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card text-bg-primary">
                                <div class="card-header">Registrar Nuevo Usuario  </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                    @if (auth()->user() && auth()->user()->name === 'admin')
                                        <a href="{{ route('register') }}" class="btn btn-primary"> Acceder</a>
                                    @else
                                        <a href="" class="btn btn-primary"> Acceso Restringido </a>
                                    @endif
                                    </h5>
                                    <p class="card-text">.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card text-bg-secondary">
                                <div class="card-header">Registrar Socio</div>
                                <div class="card-body">
                                    <h5>
                                       <a href="{{ url('socios/create') }}" class="btn btn-secondary"> Acceso  </a>
                                    </h5>
                               
                                    <p class="card-text">.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card text-bg-success">
                                <div class="card-header">Historial del Socio</div>
                                <div class="card-body">
                                <h5>
                                       <a href="{{ url('socios/edit') }}" class="btn btn-success">  Acceso   </a>
                                    </h5>
                                    <p class="card-text">.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card text-bg-danger">
                                <div class="card-header">Recuperar Password</div>
                                <div class="card-body">
                                <h5 class="card-title">
                                    @if (auth()->user() && auth()->user()->name === 'admin')
                                        <a href="{{ route('password.request') }}" class="btn btn-danger"> Acceso </a>
                                        @else
                                        <a href="" class="btn btn-danger"> Acceso Restringido </a>
                                    @endif
                                    </h5>
                                    <p class="card-text">.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card text-bg-warning">
                                <div class="card-header">Registrar Aportes</div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ url('socios') }}" class="btn btn-warning">  Acceso   </a>
                                    </h5>
                                    <p class="card-text">.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card text-bg-info">
                                <div class="card-header">Registrar Lote</div>
                                <div class="card-body">
                                    <h5 class="card-title">   <a href="{{ url('socios') }}" class="btn btn-info">  Acceso  </a></h5>
                                    <p class="card-text">.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card text-bg-light">
                                <div class="card-header">Registrar Documentos del Socio</div>
                                <div class="card-body">
                                    <h5 class="card-title">   <a href="{{ url('socios') }}" class="btn btn-light">  Acceso  </a></h5>
                                    <p class="card-text">.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card text-bg-dark">
                                <div class="card-header">Registrar Ajustes Aportes</div>
                                <div class="card-body">
                                <h5 class="card-title">   <a href="{{ url('socios') }}" class="btn btn-dark">  Acceso  </a></h5>
                                    <p class="card-text">.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card text-bg-primary">
                                <div class="card-header">Listado de Socios</div>
                                <div class="card-body">
                                <h5 class="card-title">   <a href="{{ url('socios') }}" class="btn btn-primary">   Acceso  </a></h5>
                                    <p class="card-text">.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin del contenedor de las tarjetas -->
<!--contiene las cards -->
</div>

            </div>
        </div>
    </div>
</div>
@endsection
