@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-8 offset-2">
            <h1>Add new post</h1>
        </div>
    </div>
    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label"><h5>Post caption</h5></label>
                    
                    <textarea
                    id="caption" 
                    type="text" 
                    class="form-control @error('caption') is-invalid @enderror" 
                    name="caption" 
                    value="{{ old('caption') }}">{{ old('caption') }}</textarea>
                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    
                </div>
                
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-8 offset-2">
                <label for="caption" class="col-md-4 col-form-label"><h5>Post image</h5></label>
                <input type="file" class="form-control-file" id="image" name="image">
            
                @error('image')
                    <strong class="text-danger italic">{{ $message }}</strong>
                @enderror
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-8 offset-2">
                <button class="btn btn-primary">Upload post</button>
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
