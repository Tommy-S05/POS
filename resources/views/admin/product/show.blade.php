@extends('layouts.admin')
@section('title', 'Información de Producto')

@section('styles')

@endsection

@section('create')
    <li class="nav-item d-none d-lg-flex">
        <a class="nav-link" href="{{ route('providers.create') }}">
            <span class="btn btn-primary">+ Crear nuevo</span>
        </a>
    </li>
@endsection

@section('options')

@endsection

@section('preference')

@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                {{ $product->name }}
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel de Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Productos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="border-bottom text-center pb-4">
                                    <img src="{{ file_exists('images/'. $product->image) ? asset('images/'. $product->image) : url($product->image) }}" class="img-lg mb-3">
                                    <h3>
                                        {{ $product->name }}
                                    </h3>
                                    <div class="d-flex justify-content-between">

                                    </div>
                                </div>
                                <div class="py-4">
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Status
                                        </span>
                                        <span class="float-right text-muted">
                                            {{ $product->status }}
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Proveedor
                                        </span>
                                        <span class="float-right text-muted">
                                            <a href="{{ route('providers.show', $product->provider_id) }}">
                                                {{ $product->provider->name }}
                                            </a>
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Categoría
                                        </span>
                                        <span class="float-right text-muted">
{{--                                            PRODUCTO POR CATEGORíA--}}
                                            <a href="">
                                                {{ $product->category->name }}
                                            </a>
                                        </span>
                                    </p>
{{--                                    <p class="clearfix">--}}
{{--                                        <span class="float-left">--}}
{{--                                            Facebook--}}
{{--                                        </span>--}}
{{--                                        <span class="float-right text-muted">--}}
{{--                                            <a href="#">David Grey</a>--}}
{{--                                        </span>--}}
{{--                                    </p>--}}
{{--                                    <p class="clearfix">--}}
{{--                                        <span class="float-left">--}}
{{--                                            Twitter--}}
{{--                                        </span>--}}
{{--                                        <span class="float-right text-muted">--}}
{{--                                            <a href="#">@davidgrey</a>--}}
{{--                                        </span>--}}
{{--                                    </p>--}}
                                </div>
                                @if($product->status == 'ACTIVE')
                                    <a href="{{ route('products.change', $product) }}" class="btn btn-success btn-block">{{ $product->status }}</a>
                                @else
                                    <a href="{{ route('products.change', $product) }}" class="btn btn-danger btn-block">{{ $product->status }}</a>
                                @endif

                            </div>
                            <div class="col-lg-8 pl-lg-5">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4>
                                            Información de Producto
                                        </h4>
                                    </div>
                                </div>
                                <div class="profile-feed">
                                    <div class="d-flex align-items-start profile-feed-item">
                                        <div class="form-group col-md-6">
                                            <strong>
                                                <i class="fab fa-product-hunt mr-1"></i>
                                                Código
                                            </strong>
                                            <p class="text-muted">
                                                {{ $product->code }}
                                            </p>
                                            <hr>

                                            <strong>
                                                <i class="fab fa-product-hunt mr-1"></i>
                                                Nombre
                                            </strong>
                                            <p class="text-muted">
                                                {{ $product->name }}
                                            </p>
                                            <hr>

                                            <strong>
                                                <i class="fas fa-map-marked-alt mr-1"></i>
                                                Precio de Venta
                                            </strong>
                                            <p class="text-muted">
                                                $RD {{ number_format($product->sell_price, 2) }}
                                            </p>
                                            <hr>

                                            <strong>
                                                <i class="far fa-id-card mr-1"></i>
                                                Stock
                                            </strong>
                                            <p class="text-muted">
                                                {{ $product->stock }}
                                            </p>
                                            <hr>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <strong>
                                                <i class="fas fa-phone mr-1"></i>
                                                Estado
                                            </strong>
                                            <p class="text-muted">
                                                {{ $product->status }}
                                            </p>
                                            <hr>

                                            <strong>
                                                <i class="fas fa-envelope mr-1"></i>
                                                Categoría
                                            </strong>
                                            <p class="text-muted">
                                                {{ $product->category->name }}
                                            </p>
                                            <hr>

                                            <strong>
                                                <i class="fas fa-map-marked-alt mr-1"></i>
                                                Proveedor
                                            </strong>
                                            <p class="text-muted">
                                                {{ $product->provider->name }}
                                            </p>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{ route('products.index') }}" class="btn btn-primary float-right">
                            Regresar
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('Melody/js/profile-demo.js') !!}
    {!! Html::script('Melody/js/data-table.js') !!}
@endsection
