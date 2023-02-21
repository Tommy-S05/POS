@extends('layouts.admin')
@section('title', 'Gestión de Empresa')

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
                Gestión de Empresa
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel de Administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Gestión de Empresa</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Gestión de Empresa</h4>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>
                                    <i class="fas fa-file-signature mr-1"></i>
                                    Nombre
                                </strong>
                                <p class="text-muted">
                                    {{ $business->name }}
                                </p>
                                <hr>

                                <strong>
                                    <i class="fas fa-align-left mr-1"></i>
                                    Descripción
                                </strong>
                                <p class="text-muted">
                                    {{ $business->description }}
                                </p>
                                <hr>

                                <strong>
                                    <i class="fas fa-map-marked-alt mr-1"></i>
                                    Dirección
                                </strong>
                                <p class="text-muted">
                                    {{ $business->address }}
                                </p>
                                <hr>

                                <strong>
                                    <i class="fas fa-envelope mr-1"></i>
                                    Correo Electrónico
                                </strong>
                                <p class="text-muted">
                                    {{ $business->email }}
                                </p>
                                <hr>
                            </div>

                            <div class="form-group col-md-6">
                                <strong>
                                    <i class="far fa-id-card mr-1"></i>
{{--                                    <i class="far fa-address-card mr-1"></i>--}}
                                    RUC
                                </strong>
                                <p class="text-muted">
                                    {{ $business->ruc_number }}
                                </p>
                                <hr>

                                <strong>
                                    <i class="fas fa-phone mr-1"></i>
                                    Telefono
                                </strong>
                                <p class="text-muted">
                                    {{ $business->phone }}
                                </p>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>
                                            <i class="fas fa-exclamation-circle mr-1"></i>
                                            Logo
                                        </strong>
{{--                                        <div class="col-md-6">--}}
                                            <img style="width: 150px; height: 50px;" src="{{ file_exists('images/'. $business->logo) ? asset('images/'. $business->logo) : url($business->logo) }}" class="rounded ml-1" alt="Logo">
{{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal-2">
                                Actualizar
                                <i class="fa-solid fa-rotate-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    Modal--}}
    <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Actualizar Datos de Empresa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('businesses.update', $business) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="form-label">Nombre</label>
                            <input value="{{ $business->name }}" type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Descripcion</label>
                            <textarea class="form-control" name="description" id="description" rows="3">{{ $business->address }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input value="{{ $business->email }}" type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Dirrección</label>
                            <input value="{{ $business->address }}" type="text" name="address" id="address" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="ruc_number">RUC Number</label>
                            <input value="{{ $business->ruc_number }}" type="number" name="ruc_number" id="ruc_number" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="phome">Número de Contacto</label>
                            <input value="{{ $business->phone }}" type="text" name="phone" id="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <h4 class="card-title d-flex">
                                Actualizar logo
                                <small class="ml-auto align-self-end">
                                    Seleccionar Archivo
                                </small>
                            </h4>
                            <input type="file" class="dropify" name="picture" id="picture">
                        </div>
                        <div class="modal-footer text-muted">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{--    End Modal--}}
@endsection

@section('scripts')
{{--    {!! Html::script('Melody/js/dropify.js') !!}--}}
    @vite(['resources/Melody/js/dropify.js'])
@endsection
