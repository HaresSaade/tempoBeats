<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\likedPlaylist;
use App\Models\song;
use App\Models\likedplaylis_songs;
use Illuminate\Support\Facades\Auth;
class LikedPlaylistController extends Controller
{
    //
    public function index($id){
        $likedP = likedPlaylist::where('user_id',$id)->first();
        $pvoit = likedplaylis_songs::where('user_id' , $id);
         return view('LikedPlaylist')->with(["likedSongs"=>$likedP,"pvoit"=> $pvoit]);
    }

    public function create(Request $request){
        $song = song::where('Name',$request->songTitle)->first();
        $Lpl = likedPlaylist::where('user_id',$request->user_id)->first();
        $data = new likedplaylis_songs();
        $data->song_id =$song->id;
        $data->likedplaylist_id =$Lpl->id;
        $data->save();
        return  "The song has been added";
    }

    public function delete(Request $request){
        $song = song::where('Name',$request->songTitle)->first();
        $likedP = likedPlaylist::where('user_id',$request->user_id)->first();
        $likedsong = likedplaylis_songs::where(['likedplaylist_id' => $likedP->id, 'song_id' => $song->id])->first();
        $likedsong->delete();
        return "song deleted from playlist";
    }
}
