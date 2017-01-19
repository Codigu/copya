@extends('vendor.copya.layouts.auth')

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
            <a href="{{ url('/register') }}" class="login-panel__switch-button">Get Started</a>
          </div>

          <div class="form-content">
            <form  role="form" method="POST" action="{{ url('/password/reset') }}">
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="form-label">E-Mail Address</label>
                    <input id="email" type="email" class="form-input" name="email" value="{{ $email or old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-input" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif 
                </div>

                <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm" class="form-label">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-input" name="password_confirmation" required>

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                   
                </div>

                <div class="form-group text-center">
                   <button type="submit" class="form-button">Request reset password</button>
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