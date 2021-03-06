@extends('auth.layouts.app')

@section('content')
   <div class="container">
      <div class="row">
         <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               <div class="panel-heading">Login</div>
               <div class="panel-body">
                  <form class="form-signin" method="POST" action="{{ route('login') }}">
                     {{ csrf_field() }}
                     <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                     <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label sr-only">E-Mail Address</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                           <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                           </span>
                        @endif
                     </div>
                     <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label sr-only">Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                        @if ($errors->has('password'))
                           <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                           </span>
                        @endif
                     </div>
                     <div class="form-group">
                        <div class="checkbox">
                           <label>
                              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                              Remember Me
                           </label>
                        </div>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary btn-block">
                           Login
                        </button>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                           Forgot Your Password?
                        </a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
