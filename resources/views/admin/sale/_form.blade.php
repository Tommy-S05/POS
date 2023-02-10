<div class="form-group">
    <label for="client_id">Proveedor</label>
    <br>
    <select class="form-group" name="client_id" id="client_id">
        <option value="" disabled selected>-- Elegir Cliente --</option>
        @foreach($clients as $client)
            <option value="{{ $client->id }}">
                {{ $client->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    {{--    <label for="tax">Impuestos</label>--}}
    <input type="hidden" name="tax" id="tax" class="form-control" value="18">
</div>
<div class="form-group">
    <label for="product_id">Producto</label>
    <br>
    <select class="form-group" name="product_id" id="product_id">
        <option value="" disabled selected>-- Elegir Producto --</option>
        @foreach($products as $product)
            <option value="{{ $product->id }}_{{ $product->stock }}_{{ $product->sell_price }}">
                {{ $product->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="stock">Stock Actual</label>
    <input type="number" name="stock" id="stock" value="" class="form-control" disabled>
</div>
<div class="form-group">
    <label for="quantity">Cantidad</label>
    <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Cantidad">
</div>
<div class="form-group">
    <label for="price">Precio</label>
    <input type="number" name="price" id="price" class="form-control" disabled>
{{--    <input type="hidden" name="price" class="form-control">--}}
{{--    <input type="number" id="price" class="form-control" disabled>--}}
</div>
<div class="form-group">
    <label for="discount">Descuento</label>
    <input type="number" name="discount" id="discount" class="form-control" value="0">
</div>
<div class="form-group">
    <button type="button" id="agregar" class="btn btn-primary float-right">
        Agregar Producto
    </button>
</div>

<div class="form-group">
    <h4 class="card-title">
        Detalles de Venta
    </h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table - table-striped">
            <thead>
            <tr>
                <th>Eliminar</th>
                <th>Producto</th>
                <th>Precio ($RD)</th>
                <th>Descuento</th>
                <th>Cantidad</th>
                <th>Sub-Total ($RD)</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th colspan="4">
                    <p align="right">SUB-TOTAL: </p>
                </th>
                <th>
                    <p align="right">
                        <span id="total">$RD 0.00</span>
                    </p>
                </th>
            </tr>
            <tr>
                <th colspan="4">
                    <p align="right">TOTAL IMPUESTOS (18%): </p>
                </th>
                <th>
                    <p align="right">
                        <span id="total_impuestos">$RD 0.00</span>
                    </p>
                </th>
            </tr>
            <tr>
                <th colspan="4">
                    <p align="right">TOTAL PAGAR: </p>
                </th>
                <th>
                    <p align="right">
                        <span align="right" id="total_pagar_html">$RD 0.00</span>
                        <input type="hidden" name="total" id="total_pagar">
                    </p>
                </th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

