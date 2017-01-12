@extends('layouts.app')

@section('content')
<div class="login-wrapper">

  <div class="login-panel">
    <div class="feature-panel" style="background-image: url(https://images.unsplash.com/photo-1445620466293-d6316372ab59?dpr=2&auto=format&fit=crop&w=767&h=575&q=80&cs=tinysrgb&crop=)">
      <div class="login-panel__table">
        <div class="login-panel__table-cell login-panel__table-cell-bottom">
            <p class="feature-panel__desc">Pleasure in the job puts perfection in the work. <small class="feature-panel__desc-small">&mdash; Arsitotle</small></p>
        </div>
      </div>
    </div>
    <div class="login-panel__table">
      <div class="login-panel__table-cell">
          <div class="login-panel__switch">
            <span class="login-panel__switch-text">Don't have an account?</span>
            <a class="login-panel__switch-button" href="{{ url('/register') }}" >Get Started</a>
          </div>

          <div class="form-content">
            <form role="form" method="POST" action="{{ url('/login') }}">
            <h1 class="form-heading">Sign in to Copya.
            <small class="form-subheading">Enter your details below.</small>
            </h1>

              {{ csrf_field() }}

              <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                  <label class="form-label" for="email" >E-Mail Address</label>
                  <input class="form-input" id="email" type="email"  name="email" value="{{ old('email') }}" placeholder="jim@google.com" required autofocus>

                  @if ($errors->has('email'))
                      <span class="form-alert form-alert__error">{{ $errors->first('email') }}</span>
                  @endif
              </div>

              <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                  <label class="form-label" for="password">Password</label>
                  <input class="form-input" id="password" type="password" name="password" placeholder="Enter your password" required>

                  <a class="form-help" href="{{ url('/password/reset') }}">Forgot Your Password?</a>

                  @if ($errors->has('password'))
                      <span class="form-alert form-alert__error">{{ $errors->first('password') }}</span>
                  @endif
              </div>

              <div class="form-group text-center">
                  <button type="submit" class="form-button">Sign in</button>
              </div>

              <div class="form-group text-center">
                 <label class="form-checkbox"> 
                 <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me </label>
              </div>
            </form>
          </div>
          <!--/ .form-content -->

      </div>
      <!--/ .login-panel__table-cell -->
    </div>
    <!--/ .login-panel__table -->
  </div>
  <!--/ .login-panel -->
</div>
<!--/ .login-wrapper -->

@endsection
