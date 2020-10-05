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
                    <form action="" method="POST">
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre *" value="{{$response->name}}" required>
                                </div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-group">
                                    <input type="tel" name="phone" minlength="10" maxlength="10" class="form-control" placeholder="Celular *" value="{{$response->phone}}" required>
                                </div>     
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Dirección de correo *" value="{{$response->email}}" required>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name='address' class="form-control" placeholder="Dirección *" value="{{$response->address}}" required>
                                </div>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-group">
                                    <input type="password" name="pass" class="form-control" placeholder="Contraseña *" required>
                                </div>
                                @error('pass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-group">
                                    <input type="password" name="pass2" class="form-control"  placeholder="Confirmar Contraseña *" required>
                                </div>
                                @error('pass2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input type="submit" class="btnRegister"  value="Guardar"/>
                            </div>
                        </div>
                    </form>
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
                <div class="tab-pane fade show active" id="admin" role="tabpanel" aria-labelledby="profile-tab">
                    <h3  class="register-heading">Configuración del perfil</h3>
                    <form action="" method="POST">
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre *" value="{{$response->name}}" required>
                                </div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-group">
                                    <input type="tel" name="phone" minlength="10" maxlength="10" class="form-control" placeholder="Celular *" value="{{$response->phone}}" required>
                                </div>     
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email *" value="{{$response->email}}" required>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                               
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name='address' class="form-control" placeholder="Dirección *" value="{{$response->address}}" required>
                                </div>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-group">
                                    <input type="password" name="pass" class="form-control" placeholder="Contraseña *" required>
                                </div>
                                @error('pass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-group">
                                    <input type="password" name="pass2" class="form-control"  placeholder="Confirmar Contraseña *" required>
                                </div>
                                @error('pass2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input type="submit" class="btnRegister"  value="Guardar"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
        @endcan       
    </div>
</div>
@endsection