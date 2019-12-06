<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'caption'   => 'max:256',
            'image'     => ['required', 'image'],
        ]);

        /**
         * store image to storage/uploads in public diretory
         *
         * @param  folder name
         * @return path/filename
         */
        $imagePath = $request->image->store('uploads', 'public');
        
        // intervention the image 
        $image = Image::make(\public_path("storage/$imagePath"))->fit(1200, 1200);
        $image->save();

        $result = \auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image'   => $imagePath,
        ]);

        return redirect()->route('profile.show', [\auth()->user()->username])->withMessage('Post has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', \compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
