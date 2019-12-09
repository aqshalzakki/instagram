<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $guarded = [];

	/**
	 * showing an image url from storage
	 *
	 * @return image url
	 * @author aqshalzakki
	 **/
	public function imageUrl()
	{
		return "/storage/$this->image";
	}

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
