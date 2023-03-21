<html>
    <head><title>TempoBeat</title>
    <link href="{{ asset('css/styleHome.css') }}" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="{{asset('images/TBLogo.png')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
    </head>
    <body>
        <div class="main">
        <div class="leftBar">
            <img class="logo" src="{{ asset('images/temp.png') }}" />
            <ul class="navigation">
            <li class="link"><i class="material-icons">home</i> Home</li>
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
                 <p class="backword"> <span class="material-icons">navigate_before</span> </p>
                 <p class="forward"> <span class="material-icons">navigate_next</span> </p>
                </div>
                @if (Route::has('login'))
    @auth


    <div class="Account">
  <div class="accbtn" onclick="toggleDropdown()">
    <i class="material-icons">account_circle</i>
    <p class="username">{{ Auth::user()->name }}</p>
  </div>
  <div class="dropdown-content" id="dropdown" style="display: none">
  <div class="dpc">
    <a href="route('profile.edit')">
                            {{ __('Profile') }}</a>
  </div>
  <hr>
  <div class="dpc">
    <form id="logt"method="POST" action="{{ route('logout') }}">
      @csrf
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
            <div class="musicmenu">
                <div class="row">
                    <div class="titleR">
                        <h4 class="Title">Today's Top Hit</h4>
                        <p class="sh">Show all</p>
                    </div>
               
                <div class="RowC">
                    <div class="album " :href="route('track')">
                        <img src="{{ asset('images/shi.jfif') }}" />
                        <p class="musictitle" style="font-size:15px">Shivers (JaxJones Remix)</p>
                        <p class="author">Ed Sheeran</p>
                            <div class="playbtn"><i class="fas fa-play plybtn"></i></div>


                    </div>
                    <div class="album" >
                        <img src="{{ asset('images/di.jfif') }}" />
                        <p class="musictitle">Die For You (Remix)</p>
                        <p class="author">The Weekend & Ariana Grande</p>
                        <div class="playbtn"><i class="fas fa-play plybtn"></i></div>
                    </div>
                    <div class="album">
                        <img src="{{ asset('images/lev.jfif') }}" />
                        <p class="musictitle">Levitating</p>
                        <p class="author">dua lipa</p>
                        <div class="playbtn"><i class="fas fa-play plybtn"></i></div>
                    </div>
                    <div class="album">
                        <img src="{{ asset('images/ig.jfif') }}" />
                        <p class="musictitle">I'm Good (Blue)</p>
                        <p class="author">David Guetta & Bebe Rexha</p>
                        <div class="playbtn"><i class="fas fa-play plybtn"></i></div>
                    </div>
                    <div class="album">
                        <img src="{{ asset('images/kb.jfif') }}" />
                        <p class="musictitle">kill bill</p>
                        <p class="author">sza</p>
                        <div class="playbtn"><i class="fas fa-play plybtn"></i></div>
                    </div>
                </div>
              </div>
    
              <div class="row">
                    <div class="titleR">
                        <h4 class="Title">Live The Moment</h4>
                        <p class="sh">Show all</p>
                    </div>
               
                <div class="RowC">
                    <div class="playlist" style="background-image:url({{ asset('images/jv.jfif') }})">
                            <div class="text">
                                <h4>Jazz Vibes</h4>
                                <p>playlist of original instrumental beats that are perfect for chilling.</p>
                            </div>
                    </div>
                    <div class="playlist" style="background-image:url({{ asset('images/rm.jfif') }})">
                         <div class="text">
                                <h4>Relax you're mind</h4>
                                <p>playlist of original instrumental beats that are perfect for chilling.</p>
                            </div>
                    </div>
                    <div class="playlist" style="background-image:url({{ asset('images/hp.jfif') }})">
                        
                        <div class="text">
                                <h4>Hip Hop</h4>
                                <p>playlist of original instrumental beats that are perfect for chilling.</p>
                            </div>
                    </div>
                    <div class="playlist" style="background-image:url({{ asset('images/hs.jfif') }})">
                        
                        <div class="text">
                                <h4>Hello Spring</h4>
                                <p>playlist of original instrumental beats that are perfect for chilling.</p>
                            </div>
                    </div>
                    <div class="playlist" style="background-image:url({{ asset('images/dc.jfif') }})">
                        <div class="text">
                                <h4>Disco Vibes</h4>
                                <p>playlist of original instrumental beats that are perfect for chilling.</p>
                            </div>
                    </div>
                </div>
              </div>
              <div class="row">
                    <div class="breakline">
                        <hr>
                    </div>
              </div>
            </div>
    @if (Route::has('login'))
        
            @auth
            
            @else
            <div id="bottom">
            <div class="bleft">
            <p class="text1">HERE'S A GLIMPSE OF TEMPOBEATS</p>
            <p class="text2">Get unlimited song access with occasional ads, no credit card required, by signing up now.</p>
        </div>
        @if (Route::has('register'))
        <div class="BSU sb"><p>Sign Up</p></div>
            @endif

           
        </div>
        </div>
        @endauth
  
    @endif

    <script src="{{ asset('js/Home.js') }}"></script>
    <script>
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
    </script>
    </body>




    </html>


