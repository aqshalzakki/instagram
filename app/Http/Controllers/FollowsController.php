<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 

class FollowsController extends Controller
{
	/**
	 * store a user that follows a profile into a pivot table
	 *
	 * @return 
	 * @author aqshalzakki
	 **/
	public function store(User $user)
	{
		return auth()->user()->following()->toggle($user->profile);
	}
}
