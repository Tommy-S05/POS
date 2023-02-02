@extends('layouts.admin')
@section('title', 'Registrar Proveedores')

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
                Registro de Proveedores
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel de Administrador</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('providers.index') }}">Proveedores</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de Proveedores</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de Proveedores</h4>
                        </div>
                        <form action="{{ route('providers.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Corre Electrónico</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="ejemplo@gmail.com" required>
                            </div>

                            <div class="form-group">
                                <label for="ruc_number">RUC Number</label>
                                <input type="number" name="ruc_number" id="ruc_number" class="form-control" placeholder="RUC Number" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Dirrección</label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="Dirección">
                            </div>

                            <div class="form-group">
                                <label for="phome">Número de Contacto</label>
                                <input type="number" name="phone" id="phone" class="form-control" placeholder="Número de Contacto" required>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                            <a class="btn btn-light" href="{{ route('providers.index') }}">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('Melody/js/data-table.js') !!}
@endsection
