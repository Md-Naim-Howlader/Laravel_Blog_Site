<title>Forgot Password | Eloquent</title>
<x-guest-layout>


   <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="card-body">
      <p class="login-box-msg">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
      <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="input-group mb-2">
          <input type="email" class="form-control @error('email') is-invalid  @enderror" name="email" :value="old('email')"  autofocus placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('email')
            <div class="text-danger">{{ucwords($message)}}</div>
        @enderror
        <div class="row mt-3">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request New Password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="{{route('login')}}">Login</a>
      </p>
    </div>

</x-guest-layout>
