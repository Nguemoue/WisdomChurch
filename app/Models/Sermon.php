<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sermon extends Model
{
    use HasFactory;
    protected $guarded=[];
	public function getCustomLinkAttribute()
	{
		if($this->is_local){
			return asset("storage/".$this->video_url);
		}
		return $this->video_url;
    }
}
