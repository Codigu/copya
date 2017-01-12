@extends('layouts.app')

@section('content')

<div class="login-wrapper">

  <div class="login-panel">
    <div class="feature-panel" style="background-image: url(https://images.unsplash.com/photo-1483470134942-13bbf4677d84?dpr=2&auto=format&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb&crop=)">
      <div class="login-panel__table">
        <div class="login-panel__table-cell login-panel__table-cell-bottom">
            <p class="feature-panel__desc">Choose a job you love, and you will never have to work a day in your life. <small class="feature-panel__desc-small">&mdash; Confucius</small></p>
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
            <form role="form" method="POST" action="{{ url('/password/email') }}">
             <h1 class="form-heading">Forgot your password?
            <small class="form-subheading">Enter your email address below and we'll get you back on track.</small>
            </h1>
                  {{ csrf_field() }}

                  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      <label for="email" class="form-label">E-Mail Address</label>
                      <input class="form-input" id="email" type="email"  name="email" value="{{ old('email') }}" placeholder="jim@google.com" required>

                      @if ($errors->has('email'))
                          <span class="form-alert form-alert__error">{{ $errors->first('email') }}</span>
                      @endif
                  </div>

                  <div class="form-group text-center">
                     <button type="submit" class="form-button">Request Reset Link</button>
                  </div>

                   <div class="form-group text-center">
                    <a href="{{ url('/login') }}">Back to sign in</a>
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