<!-- linkeo del css -->
<link href="{{ asset('css/addBill.css') }}" rel="stylesheet">
<!-- Agregar facturas -->
@extends('layouts.app')
@section('content')
<!-- contenido de la pagina -->
<div class="page-content">
    <div class="form-v10-content">
        <form class="form-detail" action="#" method="post" id="myform" style="margin: 0;">
            <div class="form-left">
                <h2>Información del producto</h2>
                <!-- Detalles del producto -->
                <div class="form-group">
                    <div class="form-row form-row-1">
                        <input type="text" name="street" class="street" id="street" placeholder="Producto" required>(Producto)</input>
                    </div>
                    <div class="form-row form-row-2">
                        <input type="number" name="last_name" id="last_name" class="input-text" placeholder="Talla" required>(talla)</input>
                    </div>
                </div>
                <div class="form-row">
                    <input type="number" name="company" class="company" id="company" placeholder="Cantidad" required>(Cantidad)</input>
                </div>
                <div class="form-row">
                    <input type="number" name="price" class="company" id="company" placeholder="Costo" required>(Precio)</input>
                </div>
            </div>

            <!-- Detalles de la factura -->
            <div class="form-right">
                <h2>Detalles de la factura</h2>
                <div class="form-row">
                    <input type="text" name="street" class="street" id="street" placeholder="Total" required>
                </div>
                <div class="form-row">
                    <input type="text" name="additional" class="additional" id="additional" placeholder="Descuento" required>
                </div>
                <div class="form-group">
                    <div class="form-row form-row-1">
                        <input type="text" name="iva" class="zip" id="iva" placeholder="iva" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row form-row-1">
                        <input type="text" name="state" class="code" id="state" placeholder="Estado" required>
                    </div>
                </div>
                <div class="form-row-last">
                    <input type="submit" name="register" class="register" value="Guardar">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection