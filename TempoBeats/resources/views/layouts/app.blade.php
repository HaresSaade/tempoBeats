<html>
    <head>
    <title> @yield('title', 'Default Title')</title>
    <link href="{{ asset('css/styleHome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/search.css') }}" rel="stylesheet">
 <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{asset('images/TBLogo.png')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div>
        <div class="main">
        <div class="leftBar">
            <img class="logo" src="{{ asset('images/temp.png') }}" />
            <ul class="navigation">
            <li class="link"><i class="material-icons hm" >home</i> Home</li>
            <li class="link"><i class="fas fa-search"></i>  Search</li>
            <li class="link"><i class="glyphicon glyphicon-cd"></i> Your Library</li>
           </ul>
           <ul class="nav2">
            <li class="link2"><i class="fas fa-plus plusDiv" id="plussign"></i>Create Playlist</li>
            <li class="link2"><i class="fas fa-heart HDiv" id="Hsign"></i>Liked Songs</li>
           </ul>
           
        
        </div>
        <div class="right">
            <div class="topbar">
                <div class="switcher">
                 <div onclick="goBack()" class="backword"> <span  class="material-icons">navigate_before</span> </div>
                 <div onclick="goForward()" class="forward"> <span  class="material-icons">navigate_next</span> </div>
                </div>
                @yield('search')
                @if (Route::has('login'))
                @auth
                <div class="Account">
                  <div class="accbtn" onclick="toggleDropdown()">
                    <i class="material-icons">account_circle</i>
                    <p class="username">{{ Auth::user()->name }}</p>
                  </div>
                  <div class="dropdown-content" id="dropdown" style="display: none">
                    <div class="dpc">
                      <a href="route('profile.edit')">{{ __('Profile') }}</a>
                    </div>
                    <hr>
                      <div class="dpc">
                        <form id="logt"method="POST" action="{{ route('logout') }}">
                          @csrf
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div  href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                              </div>
                        </form>
                        </div>
                      </div>
                        </div>
 
                  

                @else
                    <div class="credentials">
            <p class="SU sb">Sign Up</p>
            <p class="LI">Log In</p>
        </div>
        @endauth
      @endif
            </div>
                
             
  
             
            <main>
                @yield('content')
            </main>
    
            @auth 
            <div class="bottombar">
        <div class="left">
                 <i class="material-icons">headset</i>
            <div class="creds">
                <p class="title">I Wanna Be Yours</p>
                <p class="artist">Arctic Monkey</p>
            </div>
            <i id="Heart" class='fas fa-heart'></i>
        </div>
        <div class="middle">
            <div class="buttons">
                 <i id="shuffle" class="material-icons">shuffle</i>
                 <i class="material-icons sk">skip_previous</i>
                <i id="play-pause" class="fas fa-play"></i>
                <i  class="material-icons sk">skip_next</i>
                <i id="repeat" class="material-icons">repeat</i>
            </div>
            <div class="musicbar">
                <p class="initial">0:00</p>
                <hr>
                <p class="final">3:03</p>
            </div>
        </div>
        <div class="right">
            <i class="material-icons">menu</i>
            <i class="fa fa-volume-down"></i>
            <div class="volumebar">
                <hr class="level">
            </div>
        </div>
    </div>

            @else
            <div id="bottom">
        <div class="bleft">
        <p class="text1">HERE'S A GLIMPSE OF TEMPOBEATS</p>
        <p class="text2">Get unlimited song access with occasional ads, no credit card required, by signing up now.</p>
        </div>
   
         @if (Route::has('register'))
            <div class="BSU sb"><p>Sign Up</p></div>
        @endif

            @endauth
            </div>

        <script>
        
        const menubtns = document.querySelectorAll(".link");
console.log(menubtns);
menubtns.forEach((menubtn, index) => {
  menubtn.addEventListener('click', () => {
    if (index === 0) {
      console.log("sign up btn clicked");
      window.location.href = "/";
    } else if (index === 1) {
      console.log("search btn clicked");
      window.location.href = "/search";
    }
  })
})

const logbtn = document.querySelector(".LI");
        logbtn.addEventListener("click", ()=>{
            console.log("Hello, you clicked the login button");
            window.location.href = "{{ route('login') }}";
        });
   
        const subtns = document.querySelectorAll(".sb");
        subtns.forEach((subtn , index)=>{
            subtn.addEventListener('click',()=>{
                console.log("sign up btn clicked");
                window.location.href= "{{ route('register')}}";
            })
        })

        function toggleDropdown() {
    var dropdown = document.getElementById("dropdown");
    if (dropdown.style.display === "none") {
      dropdown.style.display = "block";
    } else {
      dropdown.style.display = "none";
    }
  }
  function goBack() {
			window.history.back();
		}

		function goForward() {
			window.history.forward();
		}
  
  
    </script>

    <script src="{{ asset('js/Playbtn.js') }}"></script>
    <script src="{{ asset('js/Home.js') }}"></script>
    </body>
</html>
