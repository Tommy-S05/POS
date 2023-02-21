@extends('layouts.admin')
@section('title', 'Editar Usuario')

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
                Editar Usuario
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel de Administrador</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('roles.index') }}">Usuarios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Usuario</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar Usuario</h4>
                        </div>
                        {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'PUT']) !!}
                            <div class="form-group">
                                <label for="name" class="form-label">Nombre Completo</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" value="{{ $user->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="ejemplo@hotmail.com" value="{{ $user->email }}" required>
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label for="password">Contraseña</label>--}}
{{--                                <input type="password" name="password" id="password" class="form-control">--}}
{{--                                <small class="text-muted">Rellenar si desea cambiar la contraseña</small>--}}
{{--                            </div>--}}

                            <h3>Asignar Roles</h3>
                            <div class="form-group">
                                <ul class="list-unstyled">
                                    @foreach($roles as $role)
                                        <li>
                                            <label>
                                                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                                {{ $role->name }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Editar</button>
                            <a class="btn btn-light" href="{{ route('users.index') }}">Cancelar</a>
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
