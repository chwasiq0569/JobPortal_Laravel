<!doctype html>
<html lang="en">
    @push('css') <link href="/personaldetailsform.css" rel="stylesheet"> @endpush
    <x-header></x-header>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">
        <img style="width: 48px; height: 48px; object-fit:contain;" src="./logo.svg" alt="logo" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link  " aria-current="page" href="/">Job Search</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="/dashboard">Profile</a>
          </li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <li class="nav-item">
              <a class="nav-link" onclick="event.preventDefault();
              this.closest('form').submit(); " aria-current="page" href="{{ route('logout') }}">Logout</a>
            </li>
        </form>
          
          @endauth
        </ul>
        @guest
        <div class="d-flex" role="search">
          <a href="/login" class="signInBtn">Sign In</a>
          <!-- <button class="signInBtn" type="submit">Sign In</button> -->
        </div>
        @endguest
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    @if(App\Models\details::where('user_id', Auth::id())->get()->isNotEmpty())
        @php 
        $details = App\Models\details::where('user_id', Auth::id())->get();
        $update = 1; @endphp
    @else
        @php $update = 0; @endphp
    @endif
    <div class="loginFormContainer" style="border-radius: 5px;">
      <div class="card-body mt-5">
        <h3 class="text-center">Personal Details</h3>
        <br />
        <br />
        <form class="loginForm p-2" action="/profile" method="post">
            @csrf
          <div class="row g-3">
            <div class="col-lg-6 col-sm-12">
              <p class="labelText">Full Name</p>
              <input type="text" class="form-control" placeholder="Full Name" aria-label="Full Name" name="name" autofocus @if($update == 1) value="{{$details->first()->name}}" @endif>
            </div>
            <div class="col-lg-6 col-sm-12">
              <p class="labelText">Phone Number</p>
              <input type="text" class="form-control" placeholder="Phone Number" name="contact_no" aria-label="Phone Number" @if($update == 1) value="{{$details->first()->phone_no}}" @endif autofocus>
            </div>
          </div>
          <div class="row g-3">
            <div class="col-lg-6 col-sm-12">
              <p class="labelText">Rate (Optional)</p>
              <input type="text" class="form-control" placeholder="Rate" name="rate" aria-label="Rate" autofocus @if($update == 1) value="{{$details->first()->rate}}" @endif>
            </div>
            <div class="col-lg-6 col-sm-12">
              <p class="labelText">Location</p>
              <input type="text" class="form-control" placeholder="Location" name="location" aria-label="Location" autofocus @if($update == 1) value="{{$details->first()->location}}" @endif>
            </div>
          </div>

          <div class="row g-3">
            <div class="col-lg-12">
              <p class="labelText">Education</p>
              <textarea class="form-control" id="brief" name="education" rows="5">@if($update == 1) {{$details->first()->education}} @endif</textarea>
            </div>
          </div>

          <div class="row g-3">
            <div class="col-lg-12">
              <p class="labelText">Your Bio</p>
              <textarea class="form-control" id="brief" name="bio" rows="5">@if($update == 1) {{$details->first()->bio}} @endif</textarea>
            </div>
          </div>

          <div class="row g-3">
            <div class="col-lg-12">
              <p class="labelText">Brief About Yourself</p>
              <textarea class="form-control" id="brief" name="brief" rows="5">@if($update == 1) {{$details->first()->brief}} @endif</textarea>
            </div>
          </div>
          <br />

          <div class="row g-3 mb-4">
            <div class="col-lg-12">
              <p class="labelText">Skills</p>
              <textarea class="form-control" id="Skills" name="skills" rows="5">@if($update == 1) {{$details->first()->skills}} @endif</textarea>
            </div>
          </div>
          <div class="row g-3">
            <div class="col"></div>
            <div class="col-lg-12 d-grid">
              <button class="btn btn-outline-primary" type="submit">Save</button>
            </div>
            <div class="col"></div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <x-footer></x-footer>
</body>

</html>