@extends('layouts.auth')

@section('title')
Login
@endsection

@section('content')
<div class="card card-primary">
  <div class="card-header"><h4 class="text-primary">Login</h4></div>

  <div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf
      <div class="form-group">
        <label for="username">Username</label>
        <input aria-describedby="usernameHelpBlock" id="username" type="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" placeholder="Registered username" tabindex="1" value="{{ old('username') }}" autofocus>
        <div class="invalid-feedback">
          {{ $errors->first('username') }}
        </div>
      </div>

     <div class="form-group">
        <div class="d-block">
            <label for="password" class="control-label">Password</label>
        </div>
        <input aria-describedby="passwordHelpBlock" id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password" tabindex="2">
        <div class="invalid-feedback">
          {{ $errors->first('password') }}
        </div>
      </div>

      <div class="form-group">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember"{{ old('remember') ? ' checked': '' }}>
          <label class="custom-control-label" for="remember">Ingat Saya</label>
        </div>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
          Login
        </button>
      </div>
    </form>
  </div>
@endsection
