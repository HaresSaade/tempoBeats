@extends('layouts.app')

@section('title', 'TempoBeat - Music for Every Moment!')

@section('content')
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

    
@endsection
