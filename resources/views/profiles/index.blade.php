@extends('layouts.app')

@section('content')
<div class="container">
    
    @if(session()->has('message'))
        <div class="row">
            <div class="col-12">
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ asset('images/profile/'.$user->image) }}" class="rounded-circle" style="width: 80%;">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a href="{{ route('post.create') }}">Add New Post</a>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-5"><strong>141</strong> followers</div>
                <div class="pr-5"><strong>139</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title ?? '' }}</div>
            <div>{{ $user->profile->description ?? '' }}</div>
            <div><a href="{{ $user->profile->url ?? '' }}" target="_blank"> {{ $user->profile->url ?? '' }} </a></div>
        </div>
    </div>
    <div class="row pt-5">
        @forelse ($user->posts as $post)    
            <div class="col-4 pb-4">
                <img src="/storage/{{ $post->image }}" class="w-100">
            </div>    
            @empty
            <div class="col-12">
                <h2 class="text-center">No post yet!</h2>
            </div>
        @endforelse
    </div>
</div>
@endsection
