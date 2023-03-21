<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class playlist extends Model
{
   
    use HasFactory;
     public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function songs()
    {
        return $this->belongsToMany(Song::class);
    }
}