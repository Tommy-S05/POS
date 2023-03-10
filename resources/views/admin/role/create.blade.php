@extends('layouts.admin')
@section('title', 'Registro de Rol')

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
                Registro de Rol
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Panel de Administrador</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('roles.index') }}">Roles del Sistema</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de Rol</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Registro de Rol</h4>
                        </div>
                        {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
{{--                        <form action="{{ route('roles.store') }}" method="POST">--}}
{{--                            {{ csrf_field() }}--}}
                            <div class="form-group">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="guard_name">Guard Name</label>
                                <input type="text" name="guard_name" id="guard_name" class="form-control" placeholder="Guard Name">
                            </div>

                            <h3>Asignar Permisos</h3>
                            <div class="form-group">
                                <label class="mr-2 mt-2">{!! Form::radio('special', 'all-access') !!}Acceso Total</label>
                                <label class="mt-2">{!! Form::radio('special', 'no-access') !!}Ning??n Acceso</label>
                            </div>
                            <h3>Asignar Permisos</h3>
                            <div class="form-group">
                                <ul class="list-unstyled">
                                    @foreach($permissions as $permission)
                                        <li>
                                            <label>
                                                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                                                {{ $permission->name }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                            <a class="btn btn-light" href="{{ route('roles.index') }}">Cancelar</a>
                        {!! Form::close() !!}
{{--                        </form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('Melody/js/data-table.js') !!}
@endsection
