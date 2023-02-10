@extends('layouts.admin')
@section('title', 'Gestión de Ventas')

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
                Ventas
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel de Administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ventas</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Ventas</h4>
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('sales.create') }}" class="dropdown-item">
                                        Registar
                                    </a>
                                </div>
                            </div>
                        </div>
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
                                @foreach($sales as $sale)
                                    <tr>
                                        <th scope="row">
                                            <a href="{{ route('sales.show', $sale) }}">
                                                {{ $sale->id }}
                                            </a>
                                        </th>
                                        <td>
                                            {{ $sale->sale_date }}
                                        </td>
                                        <td>
                                            {{ number_format($sale->total, 2) }}
                                        </td>
                                        <td>
                                            {{ $sale->status }}
                                        </td>
                                        <td style="width: 100px">
                                            <a href="#" class="jsgrid-button jsgrid-edit-button" title="Exportar">
                                                <i class="fa-regular fa-file-pdf"></i>
                                            </a>
                                            <a href="#" class="jsgrid-button jsgrid-edit-button" title="Imprimir">
                                                <i class="fa-solid fa-print"></i>
                                            </a>
                                            <a href="{{ route('sales.show', $sale) }}" class="jsgrid-button jsgrid-edit-button" title="Detalles">
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
