<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\song;
use App\Models\playlist;
use App\Models\album;
use App\Models\artist;
use App\Models\playlistsongs;
use App\Models\SongArtists;

class dashboardController extends Controller
{
    public function index(){
        $obj = song::all();
        $al = playlist::all();
        $users = User::all();
        return view('dashboard')->with(['Allsongs'=>$obj,'allpl'=>$al,'users'=>$users]);
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'lyrics'=>'required',
            'Duration'=>'required|integer',
            'Artist'=>'required',
            'imgsrc'=>'required'
        ]);
        $art = artist::where('name',$request->Artist)->first();
        $song = new song();
        $song->name=$request->name;
        $song->lyrics=$request->lyrics;
        $song->Duration=$request->Duration;
        $filename= time().'.'.$request->file('imgsrc')->getClientOriginalExtension();
        $request->file('imgsrc')->storeAs('public/images',$filename);
        $tosave= 'storage/images/'.$filename;
        $song->imgsrc=$tosave;
        $song->save();
        $obj = new SongArtists();
        $obj->artist_id = $art->id;
        $obj->song_id =$song->id;
        $obj->save();
        return redirect(Route('dashboard'));
    }
    public function playlist(Request $request){
        $request->validate([
            'Name'=>'required',
            'bgc'=>'required',
            'imgsrc'=>'required',
            'des'=>'required'
        ]);
        $ply = new playlist();
        $ply->Name=$request->Name;
        $ply->bgc=$request->bgc;
        $ply->des=$request->des;
        $filename= time().'.'.$request->file('imgsrc')->getClientOriginalExtension();
        $request->file('imgsrc')->storeAs('public/images',$filename);
        $tosave= 'storage/images/'.$filename;
        $ply->imgsrc=$tosave;
        $ply->save();
        return redirect(Route('dashboard'));
    }
   

    public function delete($id){
        $obj = song::find($id);
        $obj->delete();
        return redirect(Route('dashboard'));
    }
    public function deletep($id){
        $obj = playlist::find($id);
        $obj->delete();
        return redirect(Route('dashboard'));
    }
}
