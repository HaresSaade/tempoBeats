<!Doctype html>
<html>
<head>
<link href="{{ asset('css/styleHome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/search.css') }}" rel="stylesheet">
    <link href="{{ asset('css/playlist.css') }}" rel="stylesheet">
    <link href="{{ asset('css/liked.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{asset('images/TBLogo.png')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/howler@2.2.3/dist/howler.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<iframe src="{{Route('Home')}}"></iframe>
@auth 
<div class="bottombar">
        <div class="left">
                 <i class="material-icons">headset</i>
            <div class="creds">
              <div class="picA"></div>
              <div>
                <p id="sT" class="title"></p>
                <p  class="artist"></p>
</div>
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
                <input type="range" id="progress-bar" class="range1" min="0" max="100" value="0">
                <p class="final">0:00</p>
            </div>
        </div>
        <div class="right">
            <i class="material-icons">menu</i>
            <i id="speaker" class="fa fa-volume-up"></i>
            
            <input type="range" id="sound-slider" class="range2" min="0" max="100" value="100" step="1">
            
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
            <script src="{{ asset('js/Playbtn.js') }}"></script>
    <script src="{{ asset('js/Home.js') }}" async></script>
</body>
<script>
       const HeartButton = document.getElementById('Heart');
let HeartMode = 'off';
HeartButton.addEventListener('click', function() {
  if (HeartMode === 'off') {
    $.ajax({
      url: '/AddLikedSong',
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: JSON.stringify({ songTitle:  songTb.textContent, user_id: {{ auth()->check() ? auth()->user()->id : 0 }} }),
      contentType: 'application/json',
      success: (data) => {
        console.log(data);
        this.classList.add('onh');
    HeartMode = 'on';
      },
      error: (xhr, status, error) => {
        console.error(error);
      },
    });
   

  } else {
    $.ajax({
      url: '/DeleteLikedSong',
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: JSON.stringify({ songTitle:  songTb.textContent, user_id: {{ auth()->check() ? auth()->user()->id : 0 }} }),
      contentType: 'application/json',
      success: (data) => {
        console.log(data);
        this.classList.remove('onh');
    HeartMode = 'off';
      },
      error: (xhr, status, error) => {
        console.error(error);
      },
    });
    
  }
});



    </script>
    </html>
