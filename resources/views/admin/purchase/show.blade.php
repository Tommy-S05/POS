@extends('layouts.admin')
@section('title', 'Detalles de Compra')

@section('styles')

@endsection

@section('create')
    <li class="nav-item d-none d-lg-flex">
        <a class="nav-link" href="{{ route('purchases.create') }}">
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
                Detalles de Compra
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel de Administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Compras</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detalles de Compra</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6 text-center">
                                <label class="form-control-label" for="num_compra">Número de Compra</label>
                                <p>{{ $purchase->id }}</p>
                            </div>
                            <div class="col-md-6 text-center">
                                <label class="form-control-label" for="proveedor">Proveedor</label>
                                <p>{{ $purchase->provider->name }}</p>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group row">
                            <h4 class="card-title ml-3">
                                Detalles de Compra
                            </h4>
                            <div class="table-responsive col-md-12">
                                <table id="detalles" class="table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Precio ($RD)</th>
                                            <th>Cantidad</th>
                                            <th>Sub-Total ($RD)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($purchaseDetails as $purchaseDetail)
                                            <tr>
                                                <td>{{ $purchaseDetail->product->name }}</td>
                                                <td>s/{{ $purchaseDetail->price }}</td>
                                                <td>{{ $purchaseDetail->quantity }}</td>
                                                <td>{{ number_format($purchaseDetail->quantity*$purchaseDetail->price, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3">
                                                <p align="right">TOTAL IMPUESTOS ({{ $purchase->tax }}%):</p>
                                            </th>
                                            <th colspan="3">
                                                <p align="right">s/{{ number_format($subtotal*$purchase->tax/100, 2) }}</p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="3">
                                                <p align="right">SUB-TOTAL:</p>
                                            </th>
                                            <th colspan="3">
                                                <p align="right">s/{{ number_format($subtotal, 2) }}</p>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="3">
                                                <p align="right">TOTAL:</p>
                                            </th>
                                            <th colspan="3">
                                                <p align="right">s/{{ number_format($purchase->total,2) }}</p>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{ route('purchases.index') }}" class="btn btn-primary float-right">
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
