@extends('layouts.app')

@section('content')
<div class="container">
	@forelse($posts as $post)
	    <div class="row">
	        <div class="col-6 offset-3">
	            <a href="{{ route('post.show', $post->id) }}">
	            	<img src="/storage/{{ $post->image }}" class="w-100">
	        	</a>
	        </div>
	     </div>

		<div class="row pt-2 pb-5">
	        <div class="col-6 offset-3">
	            <div>
	                <p>
	                    <span class="font-weight-bold">
	                        <a class="text-dark" href="{{ route('profile.show', $post->user->username) }}">
	                            {{ $post->user->username }}
	                        </a>
	                    </span>
	                    {!! nl2br($post->caption) !!}
	                </p>
	            </div>
	        </div>
	    </div>

	    @empty

	    	There is no posts available
	    	
	@endforelse

	<div class="row">
	    	<div class="col-12 d-flex justify-content-center">
	    		{{ $posts->links() }}
	    	</div>
	    </div>
</div>
@endsection
