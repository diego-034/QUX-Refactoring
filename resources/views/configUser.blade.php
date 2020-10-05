<link href="{{ asset('css/configUser.css') }}" rel="stylesheet">
@extends('layouts.app')
@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-mt-5 register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3>Bienvenido</h3>
            <p>Configuración del perfil</p>
        </div>
        @can('admin', Auth::user())
         <div class="col-md-9 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link disabled" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false" disabled>Usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="profile" aria-selected="true">Administrador</a>
                </li>
            </ul>            
            <div class="tab-content" id="myTabContent">                
                <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="profile-tab">
                    <h3  class="register-heading">Configuración del perfil</h3>
                    <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nombre *" value="{{$response->name}}" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Contraseña *" value="{{$response->name}}" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control"  placeholder="Confirmar contraseña *" value="{{$response->name}}"/>
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email *" value="{{$response->name}}" />
                            </div>
                            <div class="form-group">
                                <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Celular *" value="{{$response->name}}"/>
                            </div>                            
                            <input type="submit" class="btnRegister"  value="Guardar"/>
                        </div>
                    </div>
                </div>
            </div>
          </div>
         @endcan
         @can('customer', Auth::user())
         <div class="col-md-9 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" disabled>Administrador</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Configuración del perfil</h3>
                    <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nombre *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Contraseña *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control"  placeholder="Confirmar contraseña *" value="" />
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Celular *" value="" />
                            </div>                            
                            <input type="submit" class="btnRegister"  value="Guardar"/>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        @endcan       
    </div>
</div>
@endsection