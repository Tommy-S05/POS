@extends('layouts.admin')
@section('title', 'Gestión de Clientes')

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
                Clientes
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel de Administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Clientes</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Clientes</h4>
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('clients.create') }}" class="dropdown-item">
                                        Agregar
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Cédula</th>
                                    <th>Teléfono/Celular</th>
                                    <th>Correo Electrónico</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <th scope="row">{{ $client->id }}</th>
                                        <td>
                                            <a href="{{ route('clients.show', $client) }}">{{ $client->name }}</a>
                                        </td>
                                        <td>
                                            {{ $client->cedula }}
                                        </td>
                                        <td>
                                            {{ $client->phone }}
                                        </td>
                                        <td>
                                            {{ $client->email }}
                                        </td>
                                        <td style="width: 50px">
                                            <form action="{{ route('clients.destroy', $client) }}" method="POST">
                                                {{ csrf_field() }}
                                                @method('DELETE')
                                                <a class="jsgrid-button jsgrid-edit-button p-0" href="{{ route('clients.edit', $client) }}" title="Editar">
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
@endsection