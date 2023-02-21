@extends('layouts.admin')
@section('title', 'Gestión de Productos')

@section('styles')
@endsection

@section('options')
{{--        <li class="nav-item nav-settings d-none d-lg-block">--}}
{{--            <a class="nav-link" href="#">--}}
{{--                <i class="fas fa-ellipsis-h"></i>--}}
{{--            </a>--}}
{{--        </li>--}}
@endsection

@section('preference')
{{--    <div id="right-sidebar" class="settings-panel">--}}
{{--        <i class="settings-close fa fa-times"></i>--}}
{{--        <ul class="nav nav-tabs" id="setting-panel" role="tablist">--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">--}}
{{--                    PRODUCTOS--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}

{{--        <div class="tab-content" id="setting-content">--}}
{{--            <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">--}}
{{--                <div class="list-wrapper px-3">--}}
{{--                    <ul class="d-flex flex-column-reverse todo-list">--}}
{{--                        <li>--}}
{{--                            <a class="btn btn-primary" href="{{ route('products.create') }}">Registrar</a>--}}
{{--                        </li>--}}


{{--                        <li class="completed">--}}
{{--                            <div class="form-check">--}}
{{--                                <labe class="form-check-label">--}}
{{--                                    <input class="checkbox" type="checkbox" checked>--}}
{{--                                    Schedule meeting for next weej--}}
{{--                                </labe>--}}
{{--                            </div>--}}
{{--                            <i class="remove fa fa-times-circle"></i>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection

@section('create')
    {{--    <li class="nav-item d-none d-lg-flex">--}}
    {{--        <a class="nav-link" href="{{ route('categories.create') }}">--}}
    {{--            <span class="btn btn-primary">+ Crear nuevo</span>--}}
    {{--        </a>--}}
    {{--    </li>--}}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Prodcutos
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel de Administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Productos</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
{{--                        <h4 class="card-title">Categorías</h4>--}}
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Categorías</h4>
                            {{--                            <i class="fas fa-ellipsis-v"></i>--}}
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('categories.create') }}" class="dropdown-item">
                                        Agregar
                                    </a>
{{--                                    <button class="dropdown-item" type="button">--}}
{{--                                        Action--}}
{{--                                    </button>--}}
{{--                                    <button class="dropdown-item" type="button">--}}
{{--                                        Another--}}
{{--                                    </button>--}}
{{--                                    <button class="dropdown-item" type="button">--}}
{{--                                        Something else--}}
{{--                                    </button>--}}
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                @foreach($products as $product)--}}
{{--                                    <tr>--}}
{{--                                        <th scope="row">{{ $product->id }}</th>--}}
{{--                                        <td>--}}
{{--                                            {{ $product->name }}--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            {{ $product->description }}--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            {{ $product->price }}--}}
{{--                                        </td>--}}
{{--                                        <td style="width: 50px">--}}
{{--                                            {!! Form::open(['route' => ['products.destroy', $product], 'method' => 'DELETE']) !!}--}}

{{--                                            <a class="jsgrid-button jsgrid-edit-button" href="{{ route('products.edit', $product) }}" title="Editar">--}}
{{--                                                <i class="far fa-edit"></i>--}}
{{--                                            </a>--}}

{{--                                            <a class="jsgrid-button jsgrid-delete-button" type="submit" title="Eliminar">--}}
{{--                                                <i class="far fa-edit"></i>--}}
{{--                                            </a>--}}

{{--                                            {!! Form::close() !!}--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{--                    <div class="card-footer text-muted">--}}
                    {{--                        {{ $products->render() }}--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('Melody/js/data-table.js') !!}
@endsection
