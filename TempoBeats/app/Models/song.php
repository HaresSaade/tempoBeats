<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class song extends Model
{
    use HasFactory;
    public function playlists()
    {
        return $this->belongsToMany(Playlist::class,'playlistsongs','song_id','playlist_id');
    }


    public function album()
    {
        return $this->belongsTo(Album::class);
    }

}
