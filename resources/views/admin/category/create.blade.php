@extends('layouts.admin')
@section('title', 'Registrar Categorías')

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
                Registro de Categorías
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Panel de Administrador</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('categories.index') }}">Categorías</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de Categorías</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de Categorías</h4>
                        </div>
                        <form action="{{ route('categories.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                            <a class="btn btn-light" href="{{ route('categories.index') }}">Cancelar</a>
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
