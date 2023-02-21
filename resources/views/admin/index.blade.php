@extends('layouts.admin')
@section('title', 'Dashboard')

@section('styles')
@endsection

@section('options')
@endsection

@section('preference')
@endsection

@section('create')
@endsection

@section('content')
@endsection

@section('scripts')
    {!! Html::script('Melody/js/data-table.js') !!}
    {{--    {!! Html::script('Melody/js/dropify.js') !!}--}}
    @vite(['resources/Melody/js/dropify.js'])
@endsection
