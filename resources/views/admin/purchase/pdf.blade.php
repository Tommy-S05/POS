<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <meta http-equiv="X-UA-Compatible" content="ie-edge">--}}
    <title>Reporte de Compra</title>
{{--    <link rel="stylesheet" href="/css/pdf/pdf.css">--}}
{{--    @vite(['resources/css/pdf.css'])--}}
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        #datos {
            float: left;
            margin-top: 0%;
            margin-left: 2%;
            margin-right: 2%;
        }

        #encabezado {
            text-align: center;
            margin-left: 35%;
            margin-right: 35%;
            font-size: 15px;
        }

        #fact {
            float: right;
            margin-top: 2%;
            margin-left: 2%;
            margin-right: 2%;
            font-size: 20px;
            background: #33AFFF;
        }

        section {
            clear: left;
        }

        #cliente {
            text-align: left;
        }

        #fac, #fv, #fa {
            color: #FFFFFF;
            font-size: 15px;
        }

        #faproveedor {
            width: 40%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 15px;
        }

        #faproveedor thead {
            padding: 20px;
            background: #33AFFF;
            text-align: left;
            border-bottom: 1px solid #FFFFFF;
        }

        #faccomprador {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 15px;
        }

        #faccomprador thead {
            padding: 20px;
            background: #33AFFF;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        #facproducto {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 15px;
        }

        #facproducto thead {
            padding: 20px;
            background: #33AFFF;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        .contenido{
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
{{--        <div id="logo">--}}
{{--            <img src="" alt="Logo" id="imagen">--}}
{{--        </div>--}}
        <div>
            <table id="datos">
                <thead>
                    <tr>
                       <th id="">DATOS DEL PROVEEDOR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <p id="proveedor">
                                Nombre: {{ $purchase->provider->name }}
                                <br>
                                Dirección: {{ $purchase->provider->address }}
                                <br>
                                Teléfono: {{ $purchase->provider->phone }}
                                <br>
                                Email: {{ $purchase->provider->email }}
                            </p>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fact" class="contenido">
            <p>
                NUMERO DE COMPRA
                <br>
                {{ $purchase->id }}
            </p>
        </div>
    </header>
    <br>
    <br>
    <section>
        <div>
            <table id="faccomprador">
                <thead>
                    <tr id="fv">
                        <th>COMPRADOR</th>
                        <th>EMAIL</th>
                        <th>FECHA COMPRA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="contenido">
                        <td>{{ $purchase->user->name }}</td>
                        <td>{{ $purchase->user->email }}</td>
                        <td>{{ $purchase->purchase_date }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <br>
    <section>
        <div>
            <table id="facproducto">
                <thead>
                    <tr id="fa">
                        <th>PRODUCTO</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO ($RD)</th>
                        <th>SUB-TOTAL ($RD)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchaseDetails as $purchaseDetail)
                        <tr class="contenido">
                            <td>{{ $purchaseDetail->product->name }}</td>
                            <td>{{ $purchaseDetail->quantity }}</td>
                            <td>{{ number_format($purchaseDetail->price, 2) }}</td>
                            <td>{{ number_format($purchaseDetail->price * $purchaseDetail->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">
                            <p align="right">SUB-TOTAL:</p>
                        </th>
                        <td>
                            <p align="right">$RD {{ number_format($subtotal, 2) }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <p align="right">TOTAL IMPUESTOS ({{ number_format($purchase->tax, 1) }}%):</p>
                        </th>
                        <td>
                            <p align="right">$RD {{ number_format($subtotal*$purchase->tax/100, 2) }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <p align="right">TOTAL PAGAR:</p>
                        </th>
                        <td>
                            <p align="right">$RD {{ number_format($purchase->total, 2) }}</p>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
    <br>
    <br>
    <footer>
{{--        <div id="datos">--}}
{{--            <p id="encabezado">--}}
{{--                <b>Wapipa Store</b>--}}
{{--                <br>--}}
{{--                <b>La mejor tienda del país. Te ofrecemos los mejores servicios.</b>--}}
{{--                <br>--}}
{{--                Teléfono: 809-852-2693--}}
{{--                <br>--}}
{{--                Email: wapipastore@hotmail.com--}}
{{--            </p>--}}
{{--        </div>--}}
    </footer>
</body>
</html>
