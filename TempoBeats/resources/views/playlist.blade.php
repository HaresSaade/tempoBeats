@extends('layouts.app')

@section('title', $playlist->Name)

@section('content')

<div class="playlistcontent">
<div class="topContent" style="background: {{$playlist->bgc}}">
        <div class="tcleft"><img src="{{ asset($playlist->imgsrc) }}" /></div>
        <div class="tcright">
            <p class="one">Playlist</p>
            <p class="two">{{$playlist->Name}}</p>
            <p class="three">Tempobeats - songs</p>
        </div>
    </div>
    <div class="down">   
    <table id="customers">
        <thead>
        <th>#</th>
    <th class="titleT">Title</th>
    <th class="AlbumT">Album</th>
    <th class="DateT">Date added</th>
    <th></th>
    <th>Time</th>
  </thead>
    <tbody>
@foreach($playlist->songs as $song)
  <tr>
    <td>{{$loop->index+1}}</td>
    <td class="titleT">{{ $song->Name}}</td>
    <td class="AlbumT">{{ $song->album ? $song->album->Name : 'No Album' }}</td>
    <td class="DateT">{{ $song->created_at->diffForHumans() }}</td>
    <td><i class="fas fa-heart HbtnLp"></i></td>
    <td>{{ gmdate("i:s", $song->Duration) }}</td>
  </tr>
@endforeach

  
</tbody>
</table>
    </div>
    <div class="row">
                    <div class="breakline">
                        <hr>
                    </div>
              </div>
</div>
    <script>

        


      
    </script>
@endsection