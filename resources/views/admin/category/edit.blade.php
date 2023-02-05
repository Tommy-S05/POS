@extends('layouts.admin')
@section('title', 'Edición de Categorías')

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
                Edición de Categoría
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel de Administrador</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('categories.index') }}">Categorías</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edición de Categoría</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Edición de Categoría</h4>
                        </div>
                        <form action="{{ route('categories.update', $category) }}" method="POST">
                            @method('PUT')
                            {{ csrf_field() }}
{{--                        {!! Form::model($category, ['route'=>['categories.update', $category], 'method'=> 'PUT']) !!}--}}
                            <div class="form-group">
                                <label for="name" class="form-label">Nombre</label>
                                <input value="{{ $category->name }}" type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="">Descripción</label>
                                <textarea class="form-control" name="description" id="description" rows="3">{{ $category->description }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Editar</button>
                            <a class="btn btn-light" href="{{ route('categories.index') }}">Cancelar</a>
{{--                        {!! Form::close() !!}--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('Melody/js/data-table.js') !!}
@endsection
