<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        "start_at"=>"datetime"
    ];

    function getAuthorAttribute(){
        return $this->user->name;
    }

    function user(){
        return $this->belongsTo(User::class);
    }
}
