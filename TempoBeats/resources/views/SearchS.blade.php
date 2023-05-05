@extends('layouts.app')
@section('title','TempoBeats-Search')
@section('search')
<div class="search">
<i class="fas fa-search"></i>
<form method="get" action="{{Route('searchSong')}}">
  @csrf
<input type="search" name="search" placeholder="Search for a song" class="searcher"></input>
</form>
</div>

@endsection
@section('content')
<style>
  .searchContent{
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif ;
    background-color: #1d1b1b;
    min-height:92.1vh;
     max-height: 92.1vh;
  }
table {
  margin-top:15px;
  border-collapse: collapse;
  width: 100%;
  margin:auto;

}
img{
  width:75px;
  height:65px
}
td {
  text-align: left;
  padding: 8px;
  color:white;
  padding:17px;
  width:250px;
}
tr:nth-child(even) {
  background-color: rgba(0,0,0,0.5);
}
.plyt{
  color:white;
}
</style>
<div class="searchContent">
<table>
<tr><td><h3>Songs:</h3></td>
  </tr>
  @if(isset($searchSongs))
 @foreach($searchSongs as $obj)

 <tr>
    <td><img src="{{asset($obj->imgsrc)}}" /></td>    
    <td>{{$obj->Name}}</td>
    <td></td>
    <td>{{ gmdate("i:s", $obj->Duration) }}</td>
    <td><i id="Heart" class="fas fa-heart HbtnLp"></i></td>
    <td><i class="fas fa-play playbt"></i></td>

  </tr>
  @endforeach
  @endif
  <tr><td><h3>Artist songs:</h3></td>
  </tr>
  @if(isset($searchArtistSongs))
 @foreach($searchArtistSongs as $artist)
  @foreach($artist->songs as $obj)
  <tr>
    <td><img src="{{asset($obj->imgsrc)}}" /></td>    
    <td>{{$obj->Name}}</td>
    <td>{{ $artist->name }}</td>
    <td>{{ gmdate("i:s", $obj->Duration) }}</td>
    <td><i class="fas fa-heart HbtnLp"></i></td>
    <td><i class="fas fa-play plyt"></i></td>

  </tr>
  @endforeach
@endforeach
@endif
</table>
</div>

@endsection