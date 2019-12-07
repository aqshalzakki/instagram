<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function show($username)
    {
    	$user = User::with(['profile', 'posts'])
    				->whereUsername($username)
    				->firstOrFail();

    	return view('profiles.index', ['user' => $user]);
	}

	public function edit($user)
	{
		$user = User::with('profile')
		->whereUsername($user)
		->firstOrFail();

		$this->authorize('update', $user->profile);
		
		return view('profiles.edit', [
			'user'	=> $user,
		]);
	}
		
	public function update(Request $request, User $user){
			
		$this->authorize('update', $user->profile);

		$username = $request->validate([
			'username'	=> 'required'
		]);

		$data = $request->validate([
			'title'			=> 'max:35',
			'description' 	=> '',
			'url'			=> 'url',
			'image'			=> '',
		]);

		if ($request->has('image'))
		{
			
			$imagePath = $request->image->store('profiles', 'public');
			// intervention the image 
			$image = Image::make(\public_path("storage/$imagePath"))->fit(1000, 1000);
			
			$data = \array_merge($data, [
				'image' => $image
			]);
		}

		// update username and profile 
		$user->update($username);
		$user->profile->update($data);
		
		return \redirect()->route('profile.show', $user->username)->withMessage('Profile has been updated!');
	}
}
