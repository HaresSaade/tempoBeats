<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\song;

class SongsController extends Controller
{
    //
    public function GetSong($title)
    {
        
        $song = Song::where('Name', $title)->first();

        if ($song) {
            return response()->json(["title"=>$song->Name,"Duration"=>$song->Duration]);
        } else {
            return response()->json(["error"=>"Song not found"]);
        }
    }
}