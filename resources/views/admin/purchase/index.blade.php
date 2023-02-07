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
                    <li class="breadcrumb-item"><a href="#">Panel de Administrador</a></li>
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
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($purchases as $purchase)
                                    <tr>
                                        <th scope="row">{{ $purchase->id }}</th>
                                        <td>
                                            {{ $purchase->purchase_date }}
                                        </td>
                                        <td>
                                            {{ $purchase->total }}
                                        </td>
                                        <td>
                                            {{ $purchase->status }}
                                        </td>
                                        <td style="width: 50px">
                                            {{--                                                {!! Form::open(['route' => ['categories.destroy', $category], 'method' => 'DELETE']) !!}--}}

                                            <form action="{{ route('purchases.destroy', $category) }}" method="POST">
                                                {{ csrf_field() }}
                                                @method('DELETE')
                                                <a class="jsgrid-button jsgrid-edit-button p-0" href="{{ route('purchases.edit', $category) }}" title="Editar">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <button class="border-0 bg-transparent p-0 ml-1" type="submit">
                                                    <a class="jsgrid-button jsgrid-delete-button" type="submit" title="Eliminar">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </button>
                                            </form>
                                            {{--                                                {!! Form::close() !!}--}}
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
