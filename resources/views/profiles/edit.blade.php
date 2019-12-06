@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-8 offset-2">
            <h1>Edit Profile</h1>
        </div>
    </div>
    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label"><h5>Username</h5></label>
                    
                    <input
                    id="title" 
                    type="text" 
                    class="form-control @error('title') is-invalid @enderror" 
                    name="title" 
                    value="{{ $user->username }}">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label"><h5>Title</h5></label>
                    
                    <input
                    id="title" 
                    type="text" 
                    class="form-control @error('title') is-invalid @enderror" 
                    name="title" 
                    value="{{ $user->title }}">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label"><h5>Description</h5></label>
                    
                    <input
                    id="description" 
                    type="text" 
                    class="form-control @error('description') is-invalid @enderror" 
                    name="description" 
                    value="{{ $user->description }}">
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">
                
                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label"><h5>Url</h5></label>
                    
                    <input
                    id="url" 
                    type="text" 
                    class="form-control @error('url') is-invalid @enderror" 
                    name="url" 
                    value="{{ $user->url }}">
                    @error('url')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    
                </div>
                
            </div>
        </div>

        {{-- <div class="row">
            
            <div class="col-8 offset-2">
                <label for="caption" class="col-md-4 col-form-label"><h5>Post image</h5></label>
                <input type="file" class="form-control-file" id="image" name="image">
            
                @error('image')
                    <strong class="text-danger italic">{{ $message }}</strong>
                @enderror
            </div>

        </div> --}}
        
        <div class="row mt-4">
            <div class="col-8 offset-2">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-8 offset-2">
                <a href="{{ route('profile.show', [auth()->user()->username]) }}"> Back to profile </a>
            </div>
        </div>
    </form>

</div>
@endsection
