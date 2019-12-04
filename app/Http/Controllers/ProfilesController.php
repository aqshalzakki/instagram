<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    public function show($user)
    {
    	$user = User::whereUsername($user)->firstOrFail();
    	return view('user.profile', ['user'	=> $user]);
    }
}
