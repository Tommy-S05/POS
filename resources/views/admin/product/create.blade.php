@extends('layouts.admin')
@section('title', 'Registrar Prodcuto')

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
                Registro de Productos
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Panel de Administrador</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('products.index') }}">Productos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de Productos</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de Productos</h4>
                        </div>
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
                            </div>

                            <div class="form-group">
                                <label for="sell_price">Precio de Venta</label>
                                <input type="number" name="sell_price" id="sell_price" class="form-control" placeholder="Precio" required>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Categoría</label>
                                <br>
                                <select class="form-group" name="category_id" id="category_id">
                                    <option value="">-- Elegir Categoría --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="provider_id">Proveedor</label>
                                <br>
                                <select class="form-group" name="provider_id" id="provider_id">
                                    <option value="">-- Elegir Proveedor --</option>
                                    @foreach($providers as $provider)
                                        <option value="{{ $provider->id }}">
                                            {{ $provider->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
{{--                            <div class="custom-file mb-4">--}}
{{--                                <input type="file" class="custom-file-input" name="image" id="image" lang="es">--}}
{{--                                <label class="custom-file-label" for="image">Seleccionar Archivo</label>--}}
{{--                            </div>--}}

                            <div class="card-body">
                                <h4 class="card-title d-flex">
                                    Imagen de Producto
                                    <small class="ml-auto align-self-end">
                                        Seleccionar Archivo
                                    </small>
                                </h4>
                                <input type="file" class="dropify" name="picture" id="picture">
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                            <a class="btn btn-light" href="{{ route('products.index') }}">Cancelar</a>
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
