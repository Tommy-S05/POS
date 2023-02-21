@extends('layouts.admin')
@section('title', 'Editar Prodcuto')

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
                Edición de Productos
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel de Administrador</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('products.index') }}">Productos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edición de Producto</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Edición de Producto</h4>
                        </div>
                        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="form-label">Nombre</label>
                                <input value="{{ $product->name }}" type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
                            </div>

                            <div class="form-group">
                                <label for="sell_price">Precio de Venta</label>
                                <input value="{{ $product->sell_price }}" type="number" name="sell_price" id="sell_price" class="form-control" placeholder="Precio" required>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Categoría</label>
                                <br>
                                <select class="form-group" name="category_id" id="category_id">
                                    <option value="{{ $product->category_id }}">{{ $product->category->name }}</option>
                                    @foreach($categories as $category)
                                        @if($product->category_id != $category->id)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="provider_id">Proveedor</label>
                                <br>
                                <select class="form-group" name="provider_id" id="provider_id">
                                    <option value="{{ $product->provider->id }}">{{ $product->provider->name }}</option>
                                    @foreach($providers as $provider)
                                        @if($product->provider_id != $provider->id)
                                            <option value="{{ $provider->id }}">
                                                {{ $provider->name }}
                                            </option>
                                        @endif
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

                            <button type="submit" class="btn btn-primary mr-2">Editar</button>
                            <a class="btn btn-light" href="{{ route('products.index') }}">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
{{--    {!! Html::script('Melody/js/dropify.js') !!}--}}
    @vite(['resources/Melody/js/dropify.js'])
@endsection
