@extends('layouts.admin')
@section('title', 'Registrar Cliente')

@section('styles')
@endsection

@section('options')
@endsection

@section('preference')
@endsection

@section('create')
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Registro de Clientes
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel de Administrador</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('clients.index') }}">Clientes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de Clientes</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de Clientes</h4>
                        </div>
                        <form action="{{ route('clients.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
                            </div>

                            <div class="form-group">
                                <label for="cedula">Cédula</label>
                                <input type="number" name="cedula" id="cedula" class="form-control" placeholder="Cédula" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="ejemplo@gmail.com">
                                <small class="form-text text-muted">Este campo es opcional</small>
                            </div>

                            <div class="form-group">
                                <label for="ruc">RUC</label>
                                <input type="number" name="ruc" id="ruc" class="form-control" placeholder="RUC">
                                <small class="form-text text-muted">Este campo es opcional</small>
                            </div>

                            <div class="form-group">
                                <label for="address">Dirección</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Dirección">
                                <small class="form-text text-muted">Este campo es opcional</small>
                            </div>

                            <div class="form-group">
                                <label for="phone">Número de Contacto</label>
                                <input type="number" name="phone" id="phone" class="form-control" placeholder="Número de Contacto">
                                <small class="form-text text-muted">Este campo es opcional</small>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                            <a class="btn btn-light" href="{{ route('clients.index') }}">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('Melody/js/data-table.js') !!}
    {!! Html::script('Melody/js/dropify.js') !!}
@endsection
