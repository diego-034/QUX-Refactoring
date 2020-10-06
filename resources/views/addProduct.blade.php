<link href="{{ asset('css/addProduct.css') }}" rel="stylesheet">
@extends('layouts.app')
@section('content')
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
<div class="wrapper wrapper--w790">
    <div class="card card-5">
        <div class="card-heading">
            <h2 class="title">Crear nuevo producto</h2>
        </div>
        <div class="card-body">
            <!-- formulario de creación de productos -->
            <form action="/productos" method="POST">
            @csrf
            <div class="form-row">
                <div class="name">Nombre</div>
                    <div class="value">
                        <div class="input-group">
                            <input class="form-control" type="text" name="name">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="name">Imagen del producto</div>
                    <div class="value">
                        <input class="" type="file" name="image">
                    </div>
                </div>
                <div class="form-row">
                    <div class="name">Descripcion</div>
                    <div class="value">
                        <div class="input-group">
                            <input class="form-control" type="text" name="description">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="name">Color</div>
                    <div class="value">
                        <div class="input-group">
                            <input class="form-control" type="text" name="color">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="name">Precio</div>
                    <div class="value">
                        <div class="input-group">
                            <input class="form-control" type="number" name="price">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="name">IVA</div>
                    <div class="value">
                        <div class="input-group">
                            <input class="form-control" type="text" name="iva" value="19" disabled placeholder="19">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="name">Descuento</div>
                    <div class="value">
                        <div class="input-group">
                            <input class="form-control" type="number" name="discount" min="0">
                        </div>
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </form> <!-- fin formulario de crear producto -->
        </div>
        <!-- final card-body -->
    </div>
</div>
</div>
@endsection