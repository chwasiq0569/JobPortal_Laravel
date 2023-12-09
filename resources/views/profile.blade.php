<!doctype html>
<html lang="en">
    
    @push('css') <link href="/profile.css" rel="stylesheet"> @endpush
    <x-header></x-header>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">
        <img style="width: 48px; height: 48px; object-fit:contain;" src="/logo.svg" alt="logo" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active registerTxt" aria-current="page" href="/">Job Search</a>
          </li>
        </ul>
        <div class="d-flex" role="search">
          <a href="/login" class="signInBtn">Sign In</a>
          <!-- <button class="signInBtn" type="submit">Sign In</button> -->
        </div>
      </div>
    </div>
  </nav>

  <div id="carouselExample" class="carousel slide" style="height: 250px;">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://i.pinimg.com/originals/91/9c/57/919c5719579d855d1fa9e1c128a80d64.jpg" style="height: 250px;"
          class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://i.pinimg.com/originals/91/9c/57/919c5719579d855d1fa9e1c128a80d64.jpg" style="height: 250px;"
          class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://i.pinimg.com/originals/91/9c/57/919c5719579d855d1fa9e1c128a80d64.jpg" style="height: 250px;"
          class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container mt-5">
    <div class="userCard">
      <h4 class="userName"><span>{{$user->name}}</span></h4>
      <p>{{$user->contact_no}}</p>
      <p>{{$user->bio}}</p>
      <div class="itemsContainer">
        <div class="itemRow">
          <img src="/location.svg" />
          <span>{{$user->location}}</span>
        </div>
        <!-- <div class="itemRow">
          <img src="./experience.svg" />
          <span>4 years</span>
        </div> -->
        @if(!empty($user->rate))
        <div class="itemRow">
          <img src="/price.svg" />
          <span>{{$user->rate}}</span>
        </div>
        @endif
      </div>

      <p class="bio">{{$user->brief}}</p>
      <p><strong>Skills</strong></p>
      <ul>
        {{$user->skills}}
      </ul>
    </div>
  </div>


  <x-footer></x-footer>


</body>

</html>