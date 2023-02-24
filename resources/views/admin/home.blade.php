@extends('layouts.admin')
@section('title', 'Panel de Administrador')

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
                Panel de Administrador
            </h3>
        </div>

        {{--Card con el total comprado y vendido del mes actual--}}
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                        </div>
                        @foreach($totals as $total)
                            <div class="row">
                                <div class="col-lg-6 col-xs-6">
                                    <div class="card text-white bg-success">
                                        <div class="card-body pb-0">
                                            <div class="float-right">
                                                <i class="fas fa-cart-arrow-down fa-4x"></i>
                                            </div>
                                            <div class="text-values h4">
                                                <strong>
                                                    $RD {{ number_format($total->total_compras, 2) }} (MES ACTUAL)
                                                </strong>
                                            </div>
                                            <div class="h4">Compras</div>
                                        </div>
                                        <div class="chart-wrapper mt-3 mx-3" style="height: 35px;">
                                            <a href="{{ route('purchases.index') }}" class="small-box-footer h3">
                                                Compras <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-6">
                                    <div class="card text-white bg-info">
                                        <div class="card-body pb-0">
                                            <div class="float-right">
                                                <i class="fas fa-shopping-cart fa-4x"></i>
                                            </div>
                                            <div class="text-values h4">
                                                <strong>
                                                    $RD {{ number_format($total->total_ventas, 2) }} (MES ACTUAL)
                                                </strong>
                                            </div>
                                            <div class="h4">Ventas</div>
                                        </div>
                                        <div class="chart-wrapper mt-3 mx-3" style="height: 35px;">
                                            <a href="{{ route('sales.index') }}" class="small-box-footer h3">
                                                Ventas <i class="fa fa-arrow-circle-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{--Graficos de Compras por mes y Ventas por mes--}}
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-chart">
                                    <div class="card-header">
                                        <h4 class="text-center">Compras - Meses</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="ct-chart">
                                            <canvas id="compras">

                                            </canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-chart">
                                    <div class="card-header">
                                        <h4 class="text-center">Ventas - Meses</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="ct-chart">
                                            <canvas id="ventas">

                                            </canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--Grafico de ventas diarias--}}
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-chart">
                                    <div class="card-header">
                                        <h4 class="text-center">Ventas Diarias</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="ct-chart">
                                            <canvas id="ventas_diarias" height="125">

                                            </canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--Tabla de Productos mas vendidos--}}
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="card-heading">
                                <h4 class="card-title">Productos Más Vendidos</h4>
                            </div>
                        </div>
                        <div class="card-body scrollbar scroll_dark pt-0" style="max-height: 350px;">

                            <div class="datatable-wrapper table-responsive">
                                <table class="table table-borderless table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th>Nombre</th>
                                            <th>Código</th>
                                            <th>Stock</th>
                                            <th>Cantidad Vendida</th>
                                            <th>Ver Detalles</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($productsSales as $productSale)
                                            <tr>
                                                <th scope="row">
                                                    {{ $productSale->id }}
                                                </th>
                                                <td>
                                                    {{ $productSale->name }}
                                                </td>
                                                <td>
                                                    {{ $productSale->code }}
                                                </td>
                                                <td>
                                                    <strong>
                                                        {{ $productSale->stock }}
                                                    </strong>
                                                </td>
                                                <td>
                                                    <strong>
                                                        {{ $productSale->quantity }}
                                                    </strong>
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary btn-block" target="_blank" href="{{ route('products.show', $productSale->id) }}" title="Detalles">
                                                        <i class="fa-solid fa-eye"></i>
                                                        Ver Detalles
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

    </div>
@endsection

@section('scripts')
    @vite(['resources/Melody/js/data-table.js'])
    @vite(['resources/Melody/js/dropify.js'])
    @vite(['resources/Melody/js/chartist.js'])

    {{--Graficos Generados utilizando ChartJs--}}
    <script>
        $(function () {
            var varCompra = document.getElementById('compras').getContext('2d');
            var chartCompra = new Chart(varCompra, {
                type: 'line',
                data: {
                    labels: [<?php foreach ($purchasesMonth as $reg){
                            setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                            $mes_traducido = strftime('%B', strtotime($reg->mes));

                            echo '"'. $mes_traducido.'", ';
                        }
                    ?>],
                    datasets: [{
                        label: 'Compras',
                        data: [<?php foreach ($purchasesMonth as $reg){
                                echo ''. $reg->total_mes.', ';
                            }
                            ?>
                        ],
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 3
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            var varVenta = document.getElementById('ventas').getContext('2d');
            var chartVenta = new Chart(varVenta, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($salesMonth as $reg){
                            setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                            $mes_traducido = strftime('%B', strtotime($reg->mes));

                            echo '"'. $mes_traducido.'", ';
                        }
                        ?>
                    ],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($salesMonth as $reg){
                                echo ''. $reg->total_mes.', ';
                            }
                            ?>
                        ],
                        backgroundColor: 'rgba(20, 204, 20, 1)',
                        borderColor: 'rgba(20, 204, 20, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            var varVentas_Diarias = document.getElementById('ventas_diarias').getContext('2d');
            var chartVentas_Diarias = new Chart(varVentas_Diarias, {
                type: 'line',
                data: {
                    labels: [<?php foreach ($salesDay as $reg){
                            $dia = $reg->dia;

                            echo '"'. $dia.'", ';
                        }
                    ?>
                    ],
                    datasets: [{
                        label: 'Ventas Diarias',
                        data: [<?php foreach ($salesDay as $reg){
                                echo ''. $reg->total_dia.', ';
                            }
                        ?>
                        ],
                        backgroundColor: 'rgba(20, 204, 20, 1)',
                        borderColor: 'rgba(54, 162, 235, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        })
    </script>
@endsection
