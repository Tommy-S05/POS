@extends('layouts.admin')
@section('title', 'Registro de Venta')

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
                Registro de Venta
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel de Administrador</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('sales.index') }}">Ventas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registro de Venta</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <form action="{{ route('sales.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title">Registro de Venta</h4>
                            </div>
                            @include('admin.sale._form')
                        </div>
                        <div class="card-footer text-muted">
                            <button type="submit" id="registrar" class="btn btn-primary float-right">Registrar</button>
                            <a class="btn btn-light" href="{{ route('sales.index') }}">Cancelar</a>
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
        // var activate_taxes = $('#activate_taxes');
        // activate_taxes.change(function (){
        //     if (!$(this).prop('checked')){
        //         $('#dvOcultar').hide();
        //         $('#tax').val("0")
        //     }
        //     else {
        //         $('#dvOcultar').show();
        //         $('#tax').val("18")
        //     }
        // });

        {{--var client_id = $('#client_id');--}}
        {{--client_id.change(function (){--}}
        {{--    $.ajax({--}}
        {{--        url: "{{route('ajax.customer_points')}}",--}}
        {{--        method: "GET",--}}
        {{--        data:{--}}
        {{--            client_id: client_id.val(),--}}
        {{--        },--}}
        {{--        success: function (data){--}}
        {{--            $('#current_points').val(data.points);--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}

        $(document).ready(function (){
            $('#agregar').click(function (){
                agregar();
            });
        });

        // function disable() {
        //     document.getElementById("activate_taxes").disabled = true;
        // }

        var cont = 1;
        total = 0;
        subtotal = [];
        $('#registrar').hide();
        $('#product_id').change(mostrarValores);

        function mostrarValores() {
            datosProducto = document.getElementById('product_id').value.split('_')
            $('#price').val(datosProducto[2]);
            $('#stock').val(datosProducto[1]);
        }

        function agregar() {
            datosProducto = document.getElementById('product_id').value.split('_')

            product_id = datosProducto[0];
            producto = $('#product_id option:selected').text();
            quantity = $('#quantity').val();
            discount = $('#discount').val();
            price = $('#price').val();
            stock = $('#stock').val();
            impuestos = $('#tax').val();

            if (product_id != "" && quantity != "" && quantity > 0 && discount != "" && price != "" ){
                if (parseInt(stock) >= parseInt(quantity)){
                    subtotal[cont] = (quantity * price) - (quantity * price * discount / 100);
                    total = total + subtotal[cont];

                    var fila =
                        '<tr class="selected" id="fila' + cont +'" >' +
                        '   <td>' +
                        '       <button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+')"><i class="fa fa-times fa-2x"></i></button>' +
                        '   </td>' +
                        '   <td>' +
                        '       <input type="hidden" name="product_id[]" value="'+product_id+'">'+producto+'' +
                        '   </td>' +
                        '   <td>' +
                        '       <input type="hidden" name="price[]" value="'+parseFloat(price).toFixed(2)+'">' +
                        '       <input class="form-control" type="number" value="'+parseFloat(price).toFixed(2)+'" disabled>' +
                        '   </td>' +
                        '   <td>' +
                        '       <input type="hidden" name="discount[]" value="'+parseFloat(discount)+'">' +
                        '       <input class="form-control" type="number" value="'+parseFloat(discount)+'" disabled>' +
                        '   </td>' +
                        '   <td>' +
                        '       <input type="hidden" name="quantity[]" value="'+quantity+'">' +
                        '       <input class="form-control" type="number" value="'+quantity+'" disabled>' +
                        '   </td>' +
                        '   <td align="right">s/'+parseFloat(subtotal[cont]).toFixed(2)+'</td>' +
                        '</tr>'

                    cont++;
                    limpiar();
                    totales();
                    evaluar();

                    $('#detalles').append(fila);
                }
                else {
                    Swal.fire({
                        type: 'error',
                        text: 'La cantidad a vender supera el stock.',
                    })
                }
            }
            else {
                Swal.fire({
                    type: 'error',
                    text: 'Rellene todos los campos del detalle de venta.',
                })
            }
        }

        function limpiar() {
            $('#quantity').val("");
            $('#discount').val("0");
            $('#price').val("0");
        }

        function totales() {
            $('#total').html("$RD "+total.toFixed(2));

            total_impuestos = total * impuestos / 100;
            total_pagar = total + total_impuestos;

            $('#total_impuestos').html("$RD "+total_impuestos.toFixed(2));
            $('#total_pagar_html').html("$RD "+total_pagar.toFixed(2))
            $('#total_pagar').val(total_pagar.toFixed(2));
        }

        function evaluar() {
            if(total > 0){
                $('#registrar').show();
            }
            else {
                $('#registrar').hide();
            }
        }

        function eliminar(index) {
            total = total - subtotal[index];
            total_impuestos = total * impuestos / 100;
            total_pagar_html = total + total_impuestos;

            $('#total').html("$RD "+total);
            $('#total_impuestos').html("$RD "+total_impuestos.toFixed(2));
            $('#total_pagar_html').html("$RD "+total_pagar_html.toFixed(2))
            $('#total_pagar').val(total_pagar_html.toFixed(2));

            $('#fila' + index).remove();
            evaluar();
        }
    </script>
@endsection
