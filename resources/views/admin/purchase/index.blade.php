@extends('layouts.admin')
@section('title', 'Gestión de Compras')

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
                Compras
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Panel de Administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Compras</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Compras</h4>
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('purchases.create') }}" class="dropdown-item">
                                        Registar
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{--                        <div class="d-flex justify-content-between">--}}
                        {{--                            <h4 class="card-title">Categorías</h4>--}}
                        {{--                            <div class="btn-group">--}}
                        {{--                                <a href="#">--}}
                        {{--                                    <i class="fas fa-download"></i>--}}
                        {{--                                    Exportar--}}
                        {{--                                </a>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th style="width: 100px">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($purchases as $purchase)
                                    <tr>
                                        <th scope="row">
                                            <a href="{{ route('purchases.show', $purchase) }}">
                                                {{ $purchase->id }}
                                            </a>
                                        </th>
                                        <td>
                                            {{ $purchase->purchase_date }}
                                        </td>
                                        <td>
                                            {{ number_format($purchase->total, 2) }}
                                        </td>
                                        <td>
                                            @if($purchase->status == 'VALID')
                                                <a href="{{ route('purchases.change', $purchase) }}" class="btn btn-success pt-1 pb-1">VALIDO <i class="fa-solid fa-check"></i></a>
                                            @else
                                                <a href="{{ route('purchases.change', $purchase) }}" class="btn btn-danger pt-1 pb-1">CANCELADO <i class="fas fa-times"></i></a>
                                            @endif
                                        </td>
                                        <td style="width: 100px">
{{--                                            <a class="jsgrid-button jsgrid-edit-button" href="{{ route('purchases.edit', $purchase) }}" title="Editar">--}}
{{--                                                <i class="far fa-edit"></i>--}}
{{--                                            </a>--}}
{{--                                            <button class="border-0 bg-transparent p-0 ml-1" type="submit">--}}
{{--                                                <a class="jsgrid-button jsgrid-delete-button" type="submit" title="Eliminar">--}}
{{--                                                    <i class="far fa-trash-alt"></i>--}}
{{--                                                </a>--}}
{{--                                            </button>--}}
                                            <a href="{{ route('purchases.pdf', $purchase) }}" class="jsgrid-button jsgrid-edit-button" title="Exportar">
                                                <i class="fa-regular fa-file-pdf"></i>
                                            </a>
                                            <a href="#" class="jsgrid-button jsgrid-edit-button" title="Imprimir">
                                                <i class="fa-solid fa-print"></i>
                                            </a>
                                            <a href="{{ route('purchases.show', $purchase) }}" class="jsgrid-button jsgrid-edit-button" title="Detalles">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('Melody/js/data-table.js') !!}
    {!! Html::script('Melody/js/alerts.js') !!}
    {!! Html::script('Melody/js/avgrund.js') !!}
@endsection
