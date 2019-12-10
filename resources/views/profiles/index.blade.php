@extends('layouts.app')

@section('content')

<div class="container">
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->imageUrl() }}" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5">
            
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4 mt-1">{{ $user->username }}</div>
                    
                    @unless(auth()->user()->username == $currentUrl)
                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    @endunless
                
                </div>

                @can ('view', $user->profile)
                    <a href="{{ route('post.create') }}">Add New Post</a>
                @endcan
                
            </div>
                @can ('update', $user->profile)
                    <a href="{{ route('profile.edit', $user->username) }}">Edit Profile</a>
                @endcan
                
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $user->profile->followers->count() }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $user->following->count() }}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title ?? '' }}</div>
            <div>{!! nl2br($user->profile->description) ?? '' !!}</div>
            <div><a href="{{ $user->profile->url ?? '' }}" target="_blank"> {{ $user->profile->url ?? '' }} </a></div>
        </div>
    </div>
    <div class="row pt-5">
        @forelse ($user->posts as $post)    
            <div class="col-4 pb-4">
                <a href="{{ route('post.show', $post->id) }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>    
            @empty
            <div class="col-12">
                <h2 class="text-center">No post yet!</h2>
            </div>
        @endforelse
    </div>
</div>
@endsection
