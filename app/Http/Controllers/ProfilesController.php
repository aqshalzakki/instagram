<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function show($username)
    {
    	$user = User::with(['profile', 'posts:id,user_id,image'])
    				->whereUsername($username)
    				->firstOrFail();

    	$currentUrl = explode('/', request()->path())[1];

    	$follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

    	return view('profiles.index', [
    		'user' 		 => $user,
    		'follows'	 => $follows,
    		'currentUrl' => $currentUrl
    	]);
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
			'image'			=> 'image',
		]);

		// if user upload an image
		if ($request->has('image'))
		{
			/**
	         * store an image to storage directory
	         *
	         * @param  folder name, driver name
	         * @return file path from the given folder name, like so : profiles/filename.jpg
	         */
			$imagePath = $request->image->store('profiles', 'public');	
			
			// intervention/resize the image 
			$image = Image::make(\public_path("storage/$imagePath"))->fit(1000, 1000);
			$image->save();

			// merge the data's array 
			$data = \array_merge($data, [
				'image' => $imagePath
			]);
		}

		// update username and profile 
		$user->update($username);
		$user->profile->update($data);
		
		return \redirect()->route('profile.show', $request->input('username'))->withMessage('Profile has been updated!');
	}
}
