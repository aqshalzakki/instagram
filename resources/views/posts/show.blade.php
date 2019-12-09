@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>

        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->imageUrl() }}" class="rounded-circle w-100" style="max-width: 40px;">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a class="text-dark" href="{{ route('profile.show', $post->user->username) }}">
                                {{ $post->user->username }}
                            </a>
                            <a href="#" class="pl-3">
                                Follow
                            </a>
                        </div>
                    </div>
                </div>

                <hr>
                
                <p>
                    <span class="font-weight-bold">
                        <a class="text-dark" href="{{ route('profile.show', $post->user->username) }}">
                            {{ $post->user->username }}
                        </a>
                    </span>
                    {{ $post->caption }}
                </p>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-8">
            <a href="{{ route('profile.show', $post->user->username) }}">Back to profile</a>
        </div>
    </div>
</div>
@endsection
