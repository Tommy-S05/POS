@extends('layouts.admin')
@section('title', 'Detalles de Venta')

@section('styles')

@endsection

@section('create')
    <li class="nav-item d-none d-lg-flex">
        <a class="nav-link" href="{{ route('sales.create') }}">
            <span class="btn btn-primary">+ Registrar</span>
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
                Detalles de Venta
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Panel de Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('sales.index') }}">Ventas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detalles de Venta</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-4 text-center">
                                <label class="form-control-label" for="num_venta">Número de Venta</label>
                                <p>{{ $sale->id }}</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <label class="form-control-label" for="Cliente">Cliente</label>
                                <p><a href="{{ route('clients.show', $sale->client_id) }}">{{ $sale->client->name }}</a></p>
                            </div>
                            <div class="col-md-4 text-center">
                                <label class="form-control-label" for="vendedor">Vendedor</label>
                                <p>{{ $sale->user->name }}</p>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group row">
                            <h4 class="card-title ml-3">
                                Detalles de Venta
                            </h4>
                            <div class="table-responsive col-md-12">
                                <table id="detalles" class="table">
                                    <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio ($RD)</th>
                                        <th>Descuento</th>
                                        <th>Cantidad</th>
                                        <th>Sub-Total ($RD)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($saleDetails as $saleDetail)
                                        <tr>
                                            <td>{{ $saleDetail->product->name }}</td>
                                            <td>{{ number_format($saleDetail->price, 2) }}</td>
                                            <td>{{ number_format($saleDetail->discount, 1) }}%</td>
                                            <td>{{ $saleDetail->quantity }}</td>
                                            <td>
                                                {{ number_format($saleDetail->quantity * $saleDetail->price -
                                                (($saleDetail->quantity * $saleDetail->price) * $saleDetail->discount / 100), 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="4">
                                                <p align="right">SUB-TOTAL:</p>
                                            </th>
                                            <th>
                                                <p align="right">{{ number_format($subtotal, 2) }}</p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="4">
                                                <p align="right">TOTAL IMPUESTOS ({{ $sale->tax }}%):</p>
                                            </th>
                                            <th>
                                                <p align="right">{{ number_format($subtotal*$sale->tax/100, 2) }}</p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="4">
                                                <p align="right">TOTAL:</p>
                                            </th>
                                            <th>
                                                <p align="right">{{ number_format($sale->total, 2) }}</p>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{ route('sales.index') }}" class="btn btn-primary float-right">
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
