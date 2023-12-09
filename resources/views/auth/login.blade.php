<!doctype html>
<html lang="en">

    @push('css') <link href="/login.css" rel="stylesheet"> @endpush

<x-header></x-header>

<body>
  <x-navbar></x-navbar>
  <div class="container-fluid">
    <div class="card mt-4 m-0 loginFormContainer" style="border-radius: 5px;">
      <div class="card-body" style="padding:50px;">
        <h3 class="text-center">Sign in</h3>
        <br />
        <br />
        <form method="POST" action="{{ route('login') }}" class="loginForm">
            @csrf
          <div class="row g-3">
            <div class="col"></div>
            <div class="col-lg-4 col-md-10 col-sm-12">
              <p class="labelText">Email</p>
              <input type="text" class="form-control" placeholder="Email address" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" aria-label="First name" autofocus>
            </div>
            <div class="col"></div>
          </div>

          <div class="row g-3">
            <div class="col"></div>
            <div class="col-lg-4 col-md-10 col-sm-12">
              <div style="display: flex; align-items: center; justify-content: space-between;">
                <p class="labelText">Password </p>
                @if (Route::has('password.request'))
                    <a style="text-decoration: none; font-size: 12px;" href="{{ route('password.request') }}">Forgot Password?</a>
                @endif
              </div>
              <input class="form-control" placeholder="Password" aria-label="First name" type="password" name="password" required> 
            </div>
            <div class="col"></div>
          </div>
          <div class="row g-3">
            <div class="col"></div>
            <div class="col-lg-4 col-md-10 col-sm-12 d-grid">
              <button class="btn btn-outline-primary" type="submit">Sign In</button>
            </div>
            <div class="col"></div>
          </div>
        </form>
        <hr>
        <div class="row g-3">
          <div class="col"></div>
          <div class="col-lg-4 col-md-10 col-sm-12 d-grid">
            <a href="{{ url('auth/google') }}">
              <button class="btn btn-outline-primary googleBtn" type="button">
                <svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                  fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                  <path
                    d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                </svg>
                Continue with Google
              </button>
            </a>
          </div>
          <div class="col"></div>
        </div>
        <div class="row g-3">
          <div class="col"></div>
          <p class="text-center"><small>Don’t have an account? <a href="/register">Register</a></small></p>
          <div class="col"></div>
        </div>
      </div>
    </div>
  </div>
  <x-footer></x-footer>
</body>

</html>
