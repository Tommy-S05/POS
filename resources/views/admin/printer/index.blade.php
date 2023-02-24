@extends('layouts.admin')
@section('title', 'Gestión de Impresoras')

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
                Gestión de Impresoras
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Panel de Administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Gestión de Impresoras</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Gestión de Impresoras</h4>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>
                                    <i class="fas fa-file-signature mr-1"></i>
                                    Nombre
                                </strong>
                                <p class="text-muted">
                                    {{ $printer->name }}
                                </p>
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
                    <h5 class="modal-title" id="exampleModalLabel-2">Actualizar Datos de Impresora</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('printers.update', $printer) }}" method="POST">
                        @method('PUT')
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="form-label">Nombre</label>
                            <input value="{{ $printer->name }}" type="text" name="name" id="name" class="form-control" required>
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
    {!! Html::script('Melody/js/data-table.js') !!}
    {{--    {!! Html::script('Melody/js/dropify.js') !!}--}}
    @vite(['resources/Melody/js/dropify.js'])
@endsection
