<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reporte de Venta</title>
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
                        <th id="">DATOS DEL CLIENTE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <p id="proveedor">
                                Nombre: {{ $sale->client->name }}
                                <br>
                                Dirección: {{ $sale->client->address }}
                                <br>
                                Teléfono: {{ $sale->client->phone }}
                                <br>
                                Email: {{ $sale->client->email }}
                            </p>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fact" class="contenido">
            <p>
                NUMERO DE VENTA
                <br>
                {{ $sale->id }}
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
                        <th>VENDEDOR</th>
                        <th>EMAIL</th>
                        <th>FECHA VENTA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="contenido">
                        <td>{{ $sale->user->name }}</td>
                        <td>{{ $sale->user->email }}</td>
                        <td>{{ $sale->sale_date }}</td>
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
                        <th>DESCUENTO ({{ number_format($sale->discount, 1) }}%)</th>
                        <th>SUB-TOTAL ($RD)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($saleDetails as $saleDetail)
                        <tr class="contenido">
                            <td>{{ $saleDetail->product->name }}</td>
                            <td>{{ $saleDetail->quantity }}</td>
                            <td>{{ number_format($saleDetail->price, 2) }}</td>
                            <td>{{ number_format($saleDetail->discount, 2) }}</td>
                            <td>
                                {{ number_format($saleDetail->quantity * $saleDetail->price -
                                 (($saleDetail->quantity * $saleDetail->price) * $saleDetail->discount / 100), 2) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">
                            <p align="right">SUB-TOTAL:</p>
                        </th>
                        <td>
                            <p align="right">$RD {{ number_format($subtotal, 2) }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="4">
                            <p align="right">TOTAL IMPUESTOS (18%):</p>
                        </th>
                        <td>
                            <p align="right">$RD {{ number_format($subtotal*$sale->tax/100, 2) }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="4">
                            <p align="right">TOTAL PAGAR:</p>
                        </th>
                        <td>
                            <p align="right">$RD {{ number_format($sale->total, 2) }}</p>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
    <br>
    <br>
    <footer>
    </footer>
</body>
</html>
