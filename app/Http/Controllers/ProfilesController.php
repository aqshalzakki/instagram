<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    public function show($username)
    {
    	$user = User::with(['profile', 'posts'])
    				->whereUsername($username)
    				->firstOrFail();

    	return view('profiles.index', ['user' => $user]);
    }
}
