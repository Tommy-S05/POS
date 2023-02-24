@extends('layouts.admin')
@section('title', 'Registro de Compra')

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
                Registro de Compra
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Panel de Administrador</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('purchases.index') }}">Compras</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de Compra</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <form action="{{ route('purchases.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Registro de Compra</h4>
                            </div>
                            @include('admin.purchase._form')
                        </div>
                        <div class="card-footer text-muted">
                            <button type="submit" id="registrar" class="btn btn-primary float-right">Registrar</button>
                            <a class="btn btn-light" href="{{ route('purchases.index') }}">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('Melody/js/data-table.js') !!}
    {!! Html::script('Melody/js/alerts.js') !!}
    {!! Html::script('Melody/js/avgrund.js') !!}
    <script>
        $(document).ready(function () {
            $("#agregar").click(function () {
                agregar();
            });
        });

        var cont = 0;
        total = 0.00;
        subtotal = [];

        $("#registrar").hide();

        function agregar() {
            product_id = $("#product_id").val();
            producto = $("#product_id option:selected").text();
            quantity = $("#quantity").val();
            price = $("#price").val();
            impuestos = $("#tax").val();

            if (product_id != "" && quantity != "" && quantity > 0 && price != "") {
                subtotal[cont] = quantity * price;
                total = total + subtotal[cont];
                var fila =
                    '<tr class="selected" id="fila' + cont +'" >' +
                    '   <td>' +
                    '       <button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+')"><i class="fa fa-times"></i></button>' +
                    '   </td>' +
                    '   <td>' +
                    '       <input type="hidden" name="product_id[]" value="'+product_id+'">'+producto+'' +
                    '   </td>' +
                    '   <td>' +
                    '       <input type="hidden" id="price[]" name="price[]" value="'+price+'">' +
                    '       <input class="form-control" type="number" id="price[]" value="'+price+'" disabled>' +
                    '   </td>' +
                    '   <td>' +
                    '       <input type="hidden" name="quantity[]" value="'+quantity+'">' +
                    '       <input class="form-control" type="number" value="'+quantity+'" disabled>' +
                    '   </td>' +
                    '   <td align="right">s/'+subtotal[cont]+'</td>' +
                    '</tr>'
                cont++;
                limpiar();
                totales();
                evaluar()
                $('#detalles').append(fila);
            }

            else {
                Swal.fire({
                    type: 'error',
                    text: 'Rellene todos los campos del detalle de compra.'
                })
            }
        }

        function limpiar() {
            $('#quantity').val("");
            $('#price').val("");
        }

        function totales() {
            $('#total').html('$RD '+total.toFixed(2));
            total_impuestos = total * impuestos/100;
            total_pagar = total + total_impuestos;
            $('#total_impuestos').html("$RD "+total_impuestos);
            $('#total_pagar_html').html("$RD "+total_pagar.toFixed(2));
            $('#total_pagar').val(total_pagar.toFixed(2));
        }

        function evaluar() {
            if (total > 0){
                $("#registrar").show();
            }
            else {
                $("#registrar").hide();
            }
        }

        function eliminar(index) {
            total = total - subtotal[index];
            total_impuestos = total * impuestos/100;
            total_pagar_html = total + total_impuestos;
            $("#total").html("$RD "+total);
            $("#total_impuestos").html("$RD "+total_impuestos);
            $("#total_pagar_html").html("$RD "+total_pagar_html);
            $("#total_pagar").val(total_pagar_html.toFixed(2));
            $("#fila" + index).remove();
            evaluar();
        }
    </script>
@endsection
