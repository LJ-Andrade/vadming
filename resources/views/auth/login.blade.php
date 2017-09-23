@extends('layouts.app')

@section('content')
    
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body"><section class="flexbox-container">
            <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 m-0">
                    <div class="card-header no-border">
                        <div class="card-title text-xs-center">
                            <div class="p-1"><img src="{{ asset('vadmin-ui/app-assets/images/logo/robust-logo-dark.png') }}" alt="branding logo"></div>
                        </div>
                        <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Ingreso al Sistema</span></h6>
                    </div>
                    <div class="card-body collapse in">
                        <div class="card-block">
                            <form class="form-horizontal form-simple" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <fieldset class="form-group{{ $errors->has('email') ? ' has-error' : '' }} position-relative has-icon-left mb-0">
                                    <input id="email" type="text" name="email" class="form-control form-control-lg input-lg" placeholder="Ingrese su Email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    <div class="form-control-position">
                                        <i class="icon-head"></i>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group{{ $errors->has('password') ? ' has-error' : '' }} position-relative has-icon-left">
                                    <input id="password" type="password" name="password"  class="form-control form-control-lg input-lg" placeholder="Ingrese su contraseña" required>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    <div class="form-control-position">
                                        <i class="icon-key3"></i>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group row">
                                    <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                        <fieldset>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6 col-xs-12 text-xs-center text-md-right">
                                    {{-- <a class="card-link" href="{{ route('password.request') }}">Olvidé mi contraseña</a> --}}
                                    </div>
                                </fieldset>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    <i class="icon-unlock2"></i> Conectar
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="">
                            <p class="float-sm-left text-xs-center m-0">
                                <a class="card-link" href="{{ route('password.request') }}">Olvidé mi contraseña</a>
                            </p>
                            <p class="float-sm-right text-xs-center m-0">Nuevo Usuario? <a href="{{ route('register') }}" class="card-link">Registrarse</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection