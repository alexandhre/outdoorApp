@extends('layouts.master') 
@section('content')

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      Outdoor APP
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">{{ __('Cadastrar') }}</p>

        <form action="{{ route('register') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Insira seu nome"
              required autofocus> @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span> @endif
            <div class="input-group-append">
              <span class="fa fa-user input-group-text"></span>
            </div>
          </div>
          <div class="input-group mb-3">
            <input id="email" type="email" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Insira seu email">
            @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                      <strong>Email inválido!</strong>
                  </span> @endif
            <div class="input-group-append">
              <span class="fa fa-envelope input-group-text"></span>              
            </div>
          </div>
          <div class="input-group mb-3">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Senha" required>
            @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                    <strong>Senha não pode ser menor que 6 caracteres!</strong>
                  </span> 
              @endif
            <div class="input-group-append">
              <span class="fa fa-lock input-group-text"></span>             
            </div>
          </div>
          <div class="input-group mb-3">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Senha" required>
            @if ($errors->has('password'))
              <span class="invalid-feedback" role="alert">
                    <strong>Senha não pode ser menor que 6 caracteres!</strong>
                  </span> 
              @endif
            <div class="input-group-append">
              <span class="fa fa-lock input-group-text"></span>               
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Cadastrar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>    
        <a href="{{route('login')}}" class="text-center">Fazer login</a>
      </div>
      <!-- /.form-box -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.register-box -->
@endsection