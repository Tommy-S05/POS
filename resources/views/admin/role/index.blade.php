@extends('layouts.admin')
@section('title', 'Gestión de Roles del Sistema')

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
                Roles del Sistema
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Panel de Administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Roles del Sistema</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Roles del Sistema</h4>
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('roles.create') }}" class="dropdown-item">
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
                                    <th>Guard Name</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <th scope="row">{{ $role->id }}</th>
                                        <td>
                                            <a href="{{ route('roles.show', $role) }}">{{ $role->name }}</a>
                                        </td>
                                        <td>
                                            {{ $role->guard_name }}
                                        </td>
                                        <td style="width: 50px">
                                            <form action="{{ route('roles.destroy', $role) }}" method="POST">
                                                {{ csrf_field() }}
                                                @method('DELETE')
                                                <a class="jsgrid-button jsgrid-edit-button p-0" href="{{ route('roles.edit', $role) }}" title="Editar">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <button class="border-0 bg-transparent p-0 ml-1" type="submit">
                                                    <a class="jsgrid-button jsgrid-delete-button" type="submit" title="Eliminar">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </button>
                                            </form>
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
