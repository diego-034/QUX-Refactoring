<link href="{{ asset('css/addBill.css') }}" rel="stylesheet">
@extends('layouts.app')
@section('content')
<div class="page-content">
    <div class="form-v10-content">
        <form class="form-detail" action="#" method="post" id="myform" style="margin: 0;">
            <div class="form-left">
                <h2>Información del producto</h2>                
                <div class="form-group">
                    <div class="form-row form-row-1">
                        <select>
                            <option disabled selected>seleccione</option>
                            <option>1</option>
                            <option>1</option>
                        </select> 
                    </div>
                    <div class="form-row form-row-2">
                        <input type="number" name="last_name" id="last_name" class="input-text" placeholder="Talla" required>
                    </div>
                </div>
                <div class="form-row">
                    <input type="number" name="company" class="company" id="company" placeholder="Cantidad" required>
                </div>
            </div>

            <div class="form-right">
                <h2>Detalles de la factura</h2>
                <div class="form-row">
                    <input type="text" name="street" class="street" id="street" placeholder="Total" value="{{$response->total}}" required disabled>
                </div>
                <div class="form-row">
                    <input type="text" name="additional" class="additional" id="additional" placeholder="Descuento" value="{{$response->discount}}" required>
                </div>
                <div class="form-group">
                    <div class="form-row form-row-1">
                        <input type="text" name="iva" class="zip" id="iva" placeholder="iva" value="{{$response->iva}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-row form-row-1">
                        <input type="text" name="state" class="code" id="state" placeholder="Estado" value="{{$response->state}}" required disabled>
                    </div>
                    <div class="form-row form-row-2">
                        <input type="text" name="size" class="phone" id="size" placeholder="Talla" value="{{$response->size}}" required disabled>
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