<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Index</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link href="/index.css" rel="stylesheet">
  <link href="/signup.css" rel="stylesheet">
  <link href="/login.css" rel="stylesheet">
  <link href="/profile.css" rel="stylesheet">
  <link href="/personaldetailsform.css" rel="stylesheet">
  <script>
    var skills = []
  </script>
</head>

<body>
  @if($errors->any())
  <div id="danger-alert" class="alert alert-danger" role="alert">
    {{ implode('', $errors->all(':message')) }}
  </div>
  @endif
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
        <ul class="navbar-nav me-auto mb-lg-0">
          @auth
          <li class="nav-item">
            <p class="mt-3 signInBtn" id="personalDetailsSectionBtn">Profile</p>
          </li>
          @endauth
        </ul>
        @auth
        <!-- <div class="d-flex mx-lg-2 mb-lg-0 mb-3" role="search">
          <a href="/" class="signInBtn">Search Talent</a>
        </div> -->
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <div class="d-flex mx-lg-2 mb-lg-0 mb-3" role="search">
            <a onclick="event.preventDefault(); this.closest('form').submit();" href="/" class="signInBtn">Logout</a>
          </div>
        </form>
        @endauth
        @guest
        <div class="d-flex" role="search">
          <button id="registerBtn" class="signInBtn">Log In</button>
        </div>
        @endguest
      </div>
    </div>
  </nav>

  <div class="card">
    <form action="/search" method="get">
      @csrf
      <div class="card-body searchContainerBg py-5">
        <div class="flex justify-content-center row py-5 searchContainer">
          <div class="col-lg-3 col-md-6 col-sm-12 my-1 px-0 px-lg-2">
            <input type="text" class="form-control py-2 " placeholder="Enter Skill" aria-label="Enter Skill"
              name="skill">
          </div>
          <div class="dropdownContainer col-lg-3 col-md-6 col-sm-12 my-1 px-0">
            <input id="searchInput" type="text" class="form-control py-2" placeholder="Location" aria-label="Location"
              name="location">
            <div id="optionList">
              <div class="option">Sydney</div>
              <div class="option">Melbourne</div>
              <div class="option">Brisbane</div>
              <div class="option">Perth</div>
              <div class="option">Adelaide</div>
              <div class="option">Gold Coast</div>
              <div class="option">Canberra</div>
              <div class="option">Newcastle</div>
              <div class="option">Wollongong</div>
              <div class="option">Logan City</div>
              <div class="option">Geelong</div>
              <div class="option">Townsville</div>
              <div class="option">Cairns</div>
              <div class="option">Toowoomba</div>
              <div class="option">Mackay</div>
              <div class="option">Ballarat</div>
              <div class="option">Bendigo</div>
              <div class="option">Hobart</div>
              <div class="option">Mandurah</div>
              <div class="option">Darwin</div>
              <div class="option">Rockhampton</div>
              <div class="option">Albury</div>
              <div class="option">Bunbury</div>
              <div class="option">Coffs Harbour</div>
              <div class="option">Gladstone</div>
              <div class="option">Launceston</div>
              <div class="option">Mildura</div>
              <div class="option">Port Macquarie</div>
              <div class="option">Shepparton</div>
              <div class="option">Wagga Wagga</div>
              <div class="option">Whitsunday Region</div>
              <div class="option">Wollongong</div>
              <div class="option">Maitland</div>
              <div class="option">Bundaberg</div>
              <div class="option">Hervey Bay</div>
              <div class="option">Ipswich</div>
              <div class="option">Kalgoorlie-Boulder</div>
              <div class="option">Karratha</div>
              <div class="option">Mount Gambier</div>
              <div class="option">Muswellbrook</div>
              <div class="option">Nowra-Bomaderry</div>
              <div class="option">Orange</div>
              <div class="option">Port Augusta</div>
              <div class="option">Rockhampton</div>
              <div class="option">Tamworth</div>
              <div class="option">Traralgon</div>
              <div class="option">Wagga Wagga</div>
              <div class="option">Warrnambool</div>
              <div class="option">Whyalla</div>
              <div class="option">Albany</div>
              <div class="option">Alice Springs</div>
              <div class="option">Armadale</div>
              <div class="option">Baldivis</div>
              <div class="option">Banyule</div>
              <div class="option">Bayswater</div>
              <div class="option">Blacktown</div>
              <div class="option">Blue Mountains</div>
              <div class="option">Brimbank</div>
              <div class="option">Brisbane</div>
              <div class="option">Browning</div>
              <div class="option">Burwood</div>
              <div class="option">Canterbury-Bankstown</div>
              <div class="option">Casey</div>
              <div class="option">Cessnock</div>
              <div class="option">Clarence</div>
              <div class="option">Cockburn</div>
            </div>
          </div>
          <div class="col-lg-2 col-md-12 col-sm-12 my-1 px-0">
            <input type="submit" class="searchBtn mx-lg-2" value="Search" aria-label="Last name">
          </div>
        </div>
      </div>
    </form>
  </div>

  <div class="container mt-5">
    @if(!isset($sortby))
    @php
    $userss = App\Models\details::paginate(20);
    @endphp
    @endif

    @if(isset($search))

      @if($searchUsers->isEmpty())
        <h4>No Matches Found!</h4>
      @endif

        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Sort By
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/sortbyjoin">Join Date</a></li>
            <li><a class="dropdown-item" href="/sortbyrelevance">Relevance</a></li>
          </ul>
        </div>
        {{$searchUsers}}
        @foreach($searchUsers as $users)
        <div onclick="profileDetailsUpdate({{$users->user_id}})" class="profilePopUpBtn"
          style="text-decoration: none; all: unset;">
          <div class="userCard">
            <h4 class="userName"><span id="user_name_{{$users->user_id}}">{{$users->name}}</span></h4>
            <p id="user_bio_{{$users->user_id}}">{{$users->bio}}</p>
            <p style="display:none;" id="user_rate_{{$users->user_id}}">{{$users->rate}}</p>
            <p style="display:none;" id="user_location_{{$users->user_id}}">{{$users->location}}</p>
            <p style="display:none;" id="user_contact_no_{{$users->user_id}}">{{$users->contact_no}}</p>
            <ul id="user_skills_{{$users->user_id}}">
              @php
              $array = explode(", ", $users->skills);
              @endphp
              @foreach($array as $arr)
              <li>{{$arr}}</li>
              @endforeach
            </ul>
          </div>

        </div>
        @endforeach
        {{$searchUsers->links()}}

    @else
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Sort By
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/sortbyjoin">Join Date</a></li>
        <li><a class="dropdown-item" href="/sortbyrelevance">Relevance</a></li>
      </ul>
    </div>
    @foreach($userss as $users)
    <div onclick="profileDetailsUpdate({{$users->user_id}})" class="profilePopUpBtn"
      style="text-decoration: none; all: unset;">
      <div class="userCard">
        <h4 class="userName"><span id="user_name_{{$users->user_id}}">{{$users->name}}</span></h4>
        <p id="user_bio_{{$users->user_id}}">{{$users->bio}}</p>
        <p style="display:none;" id="user_rate_{{$users->user_id}}">{{$users->rate}}</p>
        <p style="display:none;" id="user_location_{{$users->user_id}}">{{$users->location}}</p>
        <p style="display:none;" id="user_contact_no_{{$users->user_id}}">{{$users->phone_no}}</p>
        <ul id="user_skills_{{$users->user_id}}">
          @php
          $array = explode(", ", $users->skills);
          @endphp


          @foreach($array as $arr)
          <li>{{$arr}}</li>
          @endforeach
        </ul>
      </div>
    </div>
    @endforeach
    {{$userss->links()}}
  </div>
  @endif
  <div class="container-fluid">
    <footer class="row row-cols-5 py-2 mt-5 border-top footerContainer">
      <div class="cursor-pointer col-4 d-flex justify-content-center align-items-center">
        <img class="social_icons" src="./fbnew.svg" />
        <a style="font-size: 12px;" href="#" class="linkStyles mx-1">Facebook</a>
      </div>
      <div class="cursor-pointer col-4 d-flex justify-content-center align-items-center">
        <img class="social_icons" src="./instanew.svg" />
        <a style="font-size: 12px;" href="#" class="linkStyles mx-1">Instagram</a>
      </div>
      <div class="cursor-pointer col-4 d-flex justify-content-center align-items-center">
        <img class="social_icons" src="./twitternew.svg" />
        <a style="font-size: 12px;" href="#" class="linkStyles mx-1">Twitter</a>
      </div>
    </footer>
  </div>

  <!-- auth PopUp Start-->
  <div id="BGsignupPopUp">

    <div id="signupPopUp" class="signupPopUp signupPopUpClose container-fluid">
      <!-- signup form -->
      <img id="closeSignUpPopUp" class="popupCrossIcon" src="./crossicon.png" alt="crossicon" />
      <div id="signupform" class="card m-0 loginFormContainer" style="border-radius: 5px;">
        <div class="card-body" style="padding:50px;">
          <h3 class="text-center">Register</h3>
          <br />
          <br />
          <form method="POST" action="{{ route('register') }}" class="loginForm">
            @csrf
            <input type="text" name="name" value="Anon" style="display:none;" />
            <div class="row g-3">
              <div class="col"></div>
              <div class="col-lg-10 col-md-12 col-sm-12">
                <p class="labelText">Email*</p>
                <input onkeyup="validateRegisterForm()" id="register_email_field" type="text" class="form-control"
                  placeholder="Email address" name="email" aria-label="Email" autofocus>
              </div>
              <div class="col"></div>
            </div>
            <div class="row g-3">
              <div class="col"></div>
              <div class="col-lg-10 col-md-12 col-sm-12">
                <p class="labelText">Phone*</p>
                <input onkeyup="validateRegisterForm()" id="register_phone_field" type="text" class="form-control"
                  placeholder="Email Phone No" name="phone" aria-label="Phone" autofocus>
              </div>
              <div class="col"></div>
            </div>
            <div class="row g-3">
              <div class="col"></div>
              <div class="col-lg-10 col-md-12 col-sm-12">
                <p class="labelText">Password*</p>
                <input onkeyup="validateRegisterForm()" type="password" class="form-control" placeholder="Password"
                  name="password" id="register_password_field" onkeyup="confirmPassword();" aria-label="First name">
                <input type="password" name="password_confirmation" id="confirm" style="display:none;" />
              </div>
              <div class="col"></div>
            </div>
            <div class="row g-3">
              <div class="col"></div>
              <div class="col-lg-10 col-md-12 col-sm-12 d-grid">
                <button id="registerFORMBtn" class="btn btn-outline-primary" type="submit">Register</button>
              </div>
              <div class="col"></div>
            </div>
          </form>
          <hr>
          <div class="row g-3">
            <div class="col"></div>
            <div class="col-lg-10 col-md-12 d-grid">
              <button class="btn btn-outline-primary googleBtn" type="button">
                <svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                  fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                  <path
                    d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                </svg>
                Continue with Google</button>
            </div>
            <div class="col"></div>
          </div>
          <div class="row g-3">
            <div class="col"></div>
            <p class="text-center"><small>Already have an account? <span id="signinpageBtn"
                  style="color: blue">Login</span></small></p>
            <div class="col"></div>
          </div>
        </div>
      </div>
      <!-- sign in form -->
      <div id="signinform" class="card m-0 loginFormContainer" style="border-radius: 5px;">
        <div class="card-body" style="padding:50px;">
          <h3 class="text-center">Sign in</h3>
          <br />
          <br />
          <form method="POST" action="{{ route('login') }}" class="loginForm">
            @csrf
            <div class="row g-3">
              <div class="col"></div>
              <div class="col-lg-10 col-md-12 col-sm-12">
                <p class="labelText">Email</p>
                <input onkeyup="validateLoginForm()" id="login_email_field" type="text" class="form-control"
                  placeholder="Email address" name="email" aria-label="First name" autofocus>
              </div>
              <div class="col"></div>
            </div>

            <div class="row g-3">
              <div class="col"></div>
              <div class="col-lg-10 col-md-12 col-sm-12">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                  <p class="labelText">Password </p>
                  <!-- <a style="text-decoration: none; font-size: 12px;" href="forgot-password">Forgot Password?</a> -->
                </div>
                <input onkeyup="validateLoginForm()" id="login_password_field" type="password" class="form-control"
                  name="password" placeholder="Password" aria-label="First name">
              </div>
              <div class="col"></div>
            </div>
            <div class="row g-3">
              <div class="col"></div>
              <div class="col-lg-10 col-md-12 col-sm-12 d-grid">
                <button id="loginBtn" class="btn btn-outline-primary" type="submit">Sign In</button>
              </div>
              <div class="col"></div>
            </div>
          </form>
          <hr>
          <div class="row g-3">
            <div class="col"></div>
            <div class="col-lg-10 col-md-12 col-sm-12 d-grid">
              <button class="btn btn-outline-primary googleBtn" type="button">
                <svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                  fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                  <path
                    d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                </svg>
                Continue with Google</button>
            </div>
            <div class="col"></div>
          </div>
          <div class="row g-3">
            <div class="col"></div>
            <p class="text-center"><small>Don’t have an account? <span style="color: blue"
                  id="signuppageBtn">Register</span></small></p>
            <div class="col"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- auth PopUp End -->

  <!-- profile popup start -->
  @auth
  <div id="BGprofileSectionPopUp">
    <div id="profileSectionPopUp" class="profileSectionPopUp profilePopUpClose">
      <img id="closeProfilePopUp" class="profilePopupCrossIcon" src="./crossicon.png" alt="crossicon" />
      <div id="carouselExampleControls" class="carousel slide mt-5" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://i.pinimg.com/originals/91/9c/57/919c5719579d855d1fa9e1c128a80d64.jpg"
              class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://i.pinimg.com/originals/91/9c/57/919c5719579d855d1fa9e1c128a80d64.jpg"
              class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://i.pinimg.com/originals/91/9c/57/919c5719579d855d1fa9e1c128a80d64.jpg"
              class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <div class="container mt-1">
        <div class="userCard">
          <div class="d-flex justify-content-between align-items-center">
            <h4 class="userName"><span id='user_name_profile'>Luqman Ali</span></h4>
            <span id="user_location_profile">Perth</span>
          </div>
          <div class="d-flex justify-content-between align-items-center my-2">
            <span id="user_contact_no_profile">Phone: +923325784125</span>
            <span id="user_rate_profile"></span>
          </div>
          <p id="user_bio_profile" class="bio">Accentis Pty Ltd is a leading Australian developer of accounting and
            business management (ERP)
            software.</p>
          <!-- <p><strong>Skills</strong></p> -->
          <ul id="user_skills_profile">
            <li>PHP</li>
            <li>JAVA
            </li>
            <li>ASP
            </li>
            <li>HTML
            </li>
            <li>CSS</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  @endauth
  <!-- personal details popup start -->
  @auth
  <div id="BGpersonalDetailsSectionPopUp">
    <div id="personalDetailsSectionPopUp" class="personalDetailsSectionPopUp personalDetailsSectionPopUpClose">
      <div style="position: relative;" class="card-body">
        <img id="closePersonalDetailsSectionPopUp" class="closePersonalDetailsSectionPopUp" src="./crossicon.png"
          alt="crossicon" />
        <h3 class="text-center my-4">Personal Details</h3>
        <div class="loginForm p-2">
          @if((Auth::user()->detail)) @php $update = 1; @endphp @else @php $update = 0; @endphp @endif
          @if($update == 1)
          <form id="personalDetailsFORM" novalidate class="loginForm p-2" action="{{route('route.updateprofile')}}"
            method="post">
            @csrf
            @if($update==1) <input type="text" value="{{Auth::user()->detail->id}}" name="id" style="display: none;" />
            @endif
            <div class="row g-3">
              <div class="col-lg-6 col-sm-12">
                <p class="labelText">Full Name*</p>
                <input id="PDFORM_Full_Name_1" type="text" class="form-control PDFORM_FIELD_1" name="name"
                  placeholder="Full Name" aria-label="Full Name" autofocus required @if($update==1)
                  value="{{Auth::user()->detail->name}}" @endif>
              </div>
              <div class="col-lg-6 col-sm-12">
                <p class="labelText">Phone Number*</p>
                <input id="PDFORM_Phone_Number_1" type="text" class="form-control PDFORM_FIELD_1" name="phone_no"
                  placeholder="Phone Number" aria-label="Phone Number" autofocus required @if($update==1)
                  value="{{Auth::user()->detail->phone_no}}" @endif>
              </div>
            </div>
            <div class="row g-3">
              <div class="col-lg-6 col-sm-12">
                <p class="labelText">Rate (Optional)</p>
                <input type="text" class="form-control" name="rate" placeholder="Rate" aria-label="Rate" autofocus
                  required @if($update==1) value="{{Auth::user()->detail->rate}}" @endif>
              </div>
              <div class="col-lg-6 col-sm-12">
                <p class="labelText">Location*</p>
                <input type="text" class="form-control PDFORM_FIELD_1" name="location" placeholder="Location"
                  aria-label="Location" autofocus required @if($update==1) value="{{Auth::user()->detail->location}}"
                  @endif>
              </div>
            </div>
            <div class="row g-3">
              <div class="col-lg-12">
                <p class="labelText">Brief About Yourself*</p>
                <textarea class="form-control PDFORM_FIELD_1" name="bio" id="brief" rows="2" maxlength="120"
                  required>@if($update == 1) {{Auth::user()->detail->bio}} @endif</textarea>
              </div>
            </div>
            <br />

            <div class="row g-3 mb-4">
              <div class="col-lg-12">
                <p class="labelText">Skills* (Max 5)</p>
                <div class="row">
                  <div class="col-10">
                    <input id="skillsInput" type="text" class="form-control" placeholder="Skills (Max 5)" required
                      aria-label="Skills">
                    <input id="skillsArray" name="skills[]" type="text" class="form-control"
                      placeholder="Skills (Max 5)" required aria-label="Skills" style="display: none;">
                  </div>
                  <a id="addSkill" class="primaryBtnStyles col-2">Add</a>
                </div>
                @if($update == 1)
                @php
                $userarray = explode(", ", Auth::user()->detail->skills);
                @endphp
                @if (count($userarray) > 0)
                <script>
                  var userArray = @json($userarray);
                  console.log(userArray);
                  if (userArray.length > 0) {
                    skills = userArray.filter(value => value !== "");
                    console.log(skills);
                  } else {
                    skills = [];
                  }
                </script>
                @endif
                @endif
                <div id="skillsList">
                  <!-- <div id='' class='skillItem'>
                      <p></p><img id='' class='deleteicon' src='./crossicon.png' />
                    </div> -->
                </div>
              </div>
            </div>
            <div class="row g-3">
              <div class="col"></div>
              <div class="col-lg-12 d-grid">
                <button id="PDFORM_Save_Btn_1" type="submit" id="closePersonalDetailsSectionPopUpSaveBtn"
                  class="btn btn-outline-primary">Save</button>
                <br />
              </div>
              <p style="display:none;" class="text-center" id='fieldsErrorMessage'>Fill all the required fields (*)</p>
              <div class="col"></div>
            </div>
          </form>
          @else
          <form novalidate class="loginForm p-2" action="/profile" method="post">
            @csrf
            @if($update==1) <input type="text" value="{{Auth::user()->detail->id}}" name="id" style="display: none;" />
            @endif
            <div class="row g-3">
              <div class="col-lg-6 col-sm-12">
                <p class="labelText">Full Name</p>
                <input type="text" class="form-control PDFORM_FIELD_1" name="name" placeholder="Full Name"
                  aria-label="Full Name" autofocus required @if($update==1) value="{{Auth::user()->detail->name}}"
                  @endif>
              </div>
              <div class="col-lg-6 col-sm-12">
                <p class="labelText">Phone Number</p>
                <input type="text" class="form-control PDFORM_FIELD_1" name="phone_no" placeholder="Phone Number"
                  aria-label="Phone Number" autofocus required @if($update==1)
                  value="{{Auth::user()->detail->phone_no}}" @endif>
              </div>
            </div>
            <div class="row g-3">
              <div class="col-lg-6 col-sm-12">
                <p class="labelText">Rate (Optional)</p>
                <input type="text" class="form-control" name="rate" placeholder="Rate" aria-label="Rate" autofocus
                  required @if($update==1) value="{{Auth::user()->detail->rate}}" @endif>
              </div>
              <div class="col-lg-6 col-sm-12">
                <p class="labelText">Location</p>
                <input type="text" class="form-control PDFORM_FIELD_1" name="location" placeholder="Location"
                  aria-label="Location" autofocus required @if($update==1) value="{{Auth::user()->detail->location}}"
                  @endif>
              </div>
            </div>
            <div class="row g-3">
              <div class="col-lg-12">
                <p class="labelText">Brief About Yourself</p>
                <textarea class="form-control PDFORM_FIELD_1" name="bio" id="brief" rows="2" maxlength="120"
                  required>@if($update == 1) {{Auth::user()->detail->bio}} @endif</textarea>
              </div>
            </div>
            <br />

            <div class="row g-3 mb-4">
              <div class="col-lg-12">
                <p class="labelText">Skills (Max 5)</p>
                <div class="row">
                  <div class="col-10">
                    <input id="skillsInput" type="text" class="form-control" placeholder="Skills (Max 5)" required
                      aria-label="Skills">
                    <input id="skillsArray" name="skills[]" type="text" class="form-control"
                      placeholder="Skills (Max 5)" required aria-label="Skills" style="display: none;">
                  </div>
                  <a id="addSkill" class="primaryBtnStyles col-2">Add</a>
                </div>
                <div id="skillsList">
                  @if($update == 1)
                  @php
                  $userarray = explode(", ", Auth::user()->detail->skills);
                  @endphp
                  @foreach($userarray as $skill)
                  <div id="{{$skill}}" class="skillItem">
                    <p>{{$skill}}</p>
                    <img id="asd" class="deleteicon" src="/crossicon.png">
                  </div>
                  @endforeach
                  @endif
                  <!-- <div id='' class='skillItem'>
                      <p></p><img id='' class='deleteicon' src='./crossicon.png' />
                    </div> -->
                </div>
              </div>
            </div>
            <div class="row g-3">
              <div class="col"></div>
              <div class="col-lg-12 d-grid">
                <button type="submit" id="closePersonalDetailsSectionPopUpSaveBtn"
                  class="btn btn-outline-primary">Save</button>
              </div>
              <div class="col"></div>
            </div>
          </form>
          @endif
        </div>
      </div>
    </div>
  </div>
  @endauth
  <!-- personal details popup end -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script src="/app.js"></script>
  <script>
    valudateFORM()

    function disableBackgroundActions(id) {
      document.body.style.overflow = 'hidden'
      if (document.getElementById('BG' + id)) {
        document.getElementById('BG' + id).classList.add('popUpBG')
      }
    }
    function enableBackgroundActions(id) {
      document.body.style.overflow = 'auto'
      if (document.getElementById('BG' + id)) {
        document.getElementById('BG' + id).classList.remove('popUpBG')
      }
    }

    function openPopUp(openBtnID, popUpID, openClass, closeClass) {
      if (document.querySelectorAll(openBtnID)) {
        Array.from(document.querySelectorAll(openBtnID)).forEach(item => item.addEventListener("click", function () {
          if (document.getElementById(popUpID)) {
            disableBackgroundActions(popUpID)
            document.getElementById(popUpID).classList.remove(closeClass)
            document.getElementById(popUpID).classList.add(openClass)
          }
        }))
      }
    }

    function closePopUp(closeBtnID, popUpID, openClass, closeClass) {
      if (document.getElementById(closeBtnID)) {
        document.getElementById(closeBtnID).addEventListener("click", function () {
          enableBackgroundActions(popUpID)
          document.getElementById(popUpID).classList.remove(openClass)
          document.getElementById(popUpID).classList.add(closeClass)
        })
      }
    }

    function handleAuthPopUps() {
      document.getElementById('signupform').style.display = 'none'
      document.getElementById('signinpageBtn').addEventListener('click',
        function () {
          document.getElementById('signinform').style.display = 'block'
          document.getElementById('signupform').style.display = 'none'
        })
      document.getElementById('signuppageBtn').addEventListener('click', function () {
        document.getElementById('signupform').style.display = 'block'
        document.getElementById('signinform').style.display = 'none'
      })
    }

    function profilePopUps() {
      openPopUp(".profilePopUpBtn", "profileSectionPopUp", "profilePopUpOpen", "profilePopUpClose")
      validateLoginForm()
      validateRegisterForm()
      closePopUp("closeProfilePopUp", "profileSectionPopUp", "profilePopUpOpen", "profilePopUpClose")
    }
    function profileDetailsUpdate(user_id) {
      console.log(user_id)
      if (document.getElementById("user_name_profile")) {
        document.getElementById("user_name_profile").innerHTML = document.getElementById("user_name_" + user_id).innerHTML
      }
      if (document.getElementById("user_bio_profile")) {
        document.getElementById("user_bio_profile").innerHTML = document.getElementById("user_bio_" + user_id).innerHTML
      }
      if (document.getElementById("user_location_profile")) {
        document.getElementById("user_location_profile").innerHTML = document.getElementById("user_location_" + user_id).innerHTML
      }
      if (document.getElementById("user_contact_no_profile")) {
        document.getElementById("user_contact_no_profile").innerHTML = document.getElementById("user_contact_no_" + user_id).innerHTML
      }
      if (document.getElementById("user_rate_profile")) {
        console.log('RATE', parseInt(document.getElementById("user_rate_" + user_id).innerHTML))
        if (parseInt(document.getElementById("user_rate_" + user_id).innerHTML)) {
          document.getElementById("user_rate_profile").innerHTML = "Rate: " + document.getElementById("user_rate_" + user_id).innerHTML + " AUD"
        }
      }
      if (document.getElementById("user_skills_profile")) {
        document.getElementById("user_skills_profile").innerHTML = document.getElementById("user_skills_" + user_id).innerHTML
      }
    }

    function personalDetailsPopUps() {
      openPopUp("#personalDetailsSectionBtn", "personalDetailsSectionPopUp", "personalDetailsSectionPopUpOpen", "personalDetailsSectionPopUpClose")
      closePopUp("closePersonalDetailsSectionPopUpSaveBtn", "personalDetailsSectionPopUp", "personalDetailsSectionPopUpOpen", "personalDetailsSectionPopUpClose")
      closePopUp("closePersonalDetailsSectionPopUp", "personalDetailsSectionPopUp", "personalDetailsSectionPopUpOpen", "personalDetailsSectionPopUpClose")
      renderSkills();
    }


    function registerBtnHandler() {
      openPopUp("#registerBtn", "signupPopUp", "signupPopUpOpen", "signupPopUpClose")
      closePopUp("closeSignUpPopUp", "signupPopUp", "signupPopUpOpen", "signupPopUpClose")
    }

    function confirmPassword() {
      let password = document.getElementById('password').value;
      document.getElementById('confirm').value = password;
    }

    registerBtnHandler()
    handleAuthPopUps()
    profilePopUps()
    personalDetailsPopUps()

    function validateLoginForm() {
      console.log(document.getElementById("login_email_field"))
      console.log(document.getElementById("login_password_field"))
      console.log(document.getElementById("login_email_field").value.length < 3 || document.getElementById("login_password_field").value.length < 3)
      document.getElementById("loginBtn").disabled = document.getElementById("login_email_field").value.length < 3 || document.getElementById("login_password_field").value.length < 3
    }

    function validateRegisterForm() {
      // console.log("registerSS", document.getElementById("register_email_field").value.length < 3)
      document.getElementById("registerFORMBtn").disabled = document.getElementById("register_email_field").value.length < 3 || document.getElementById("register_phone_field").value.length < 3 || document.getElementById("register_password_field").value.length < 3
      // console.log("registerSS", document.getElementById("registerBtn"))

    }

    function hideAlert() {
      var alert = document.getElementById('danger-alert');

      // Add the 'd-none' class to hide the alert
      if (alert) {
        alert.style.display = 'block'
      }

      // Remove the 'd-none' class after 5 seconds
      setTimeout(function () {
        alert.style.display = 'none'
      }, 5000);
    }
    if (document.getElementById('danger-alert')) {
      hideAlert();
    }
    // Trigger the function to hide the alert

  </script>
</body>

</html>