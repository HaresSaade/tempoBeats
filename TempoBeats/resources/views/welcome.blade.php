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
                @foreach($songs as $obj)
                <div class="album " :href="route('track',['id',$obj->id])">
                        <img src="{{ asset($obj->Isrc) }}" />
                        <p class="musictitle" style="font-size:15px">{{$obj->song_name}}</p>
                        <p class="author">{{$obj->artist_name}}</p>
                            <div class="playbtn"><i class="fas fa-play plybtn"></i></div>
                    </div>
                 @endforeach

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
                                <h4 class="plyt">Jazz Vibes</h4>
                                <p>playlist of original instrumental beats that are perfect for chilling.</p>
                            </div>
                    </div>
                    <div class="playlist" style="background-image:url({{ asset('images/rm.jfif') }})">
                         <div class="text">
                                <h4 class="plyt">Relax you're mind</h4>
                                <p>playlist of original instrumental beats that are perfect for chilling.</p>
                            </div>
                    </div>
                    <div class="playlist" style="background-image:url({{ asset('images/hp.jfif') }})">
                        
                        <div class="text">
                                <h4 class="plyt">Hip Hop</h4>
                                <p>playlist of original instrumental beats that are perfect for chilling.</p>
                            </div>
                    </div>
                    <div class="playlist" style="background-image:url({{ asset('images/hs.jfif') }})">
                        
                        <div class="text">
                                <h4 class="plyt">Hello Spring</h4>
                                <p>playlist of original instrumental beats that are perfect for chilling.</p>
                            </div>
                    </div>
                    <div class="playlist" style="background-image:url({{ asset('images/dc.jfif') }})">
                        <div class="text">
                                <h4 class="plyt">Disco Vibes</h4>
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
