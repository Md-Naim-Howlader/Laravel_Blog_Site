<title>Login | Eloquent</title>
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
<div class="card-body">
      <h2 class="login-box-msg">Sign in</h2>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-1">
          <input type="email" id="email" class="form-control @error('email') is-invalid  @enderror" placeholder="Email" name="email" :value="old('email')"  autofocus >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('email')
            <div class="text-danger">{{ucwords($message)}}</div>
        @enderror
        <div class="input-group my-3 ">
          <input type="password"
                            name="password"
                             autocomplete="current-password" id="password"
                            class="form-control @error('password') is-invalid  @enderror"
                            placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password')
            <div class="text-danger">{{ucwords($message)}}</div>
        @enderror
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
         @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">I forgot my password</a>
         @endif
      </p>
      <p class="mb-0">
        <a href="{{route('register')}}" class="text-center">Register a new Account</a>
      </p>
    </div>
    <!-- /.card-body -->
</x-guest-layout>
