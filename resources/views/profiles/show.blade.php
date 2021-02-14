@extends('layouts.app')

@section('content')
	<header class="mb-6 relative">
		<div class="relative">
			<img
				src="/images/default-profile-banner.jpg"
				alt=""
				class="mb-2 rounded-lg"
				style="object-fit: cover; height: 223px; width: 100%;"
			>

			<img
				src="{{ $user->avatar }}"
				alt=""
				class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
				style="width: 150px; left: 50%"
			>
		</div>

		<div class="flex justify-between items-center mb-6">
			<div>
				<h2 class="font-bold text-2xl mb-2">{{ $user->username }}</h2>
				<p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
			</div>

			<div class="flex">

				@if(current_user()->is($user))
				{{-- @can ('edit', $user) --}}
					<a href="{{ $user->path('edit') }}" class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-4">
						Edit Profile
					</a>
				{{-- @endcan --}}
				@endif

				@if (auth()->user()->isNot($user))
					<form method="POST" action="/profiles/{{ $user->name }}/follow">
						@csrf
						<button type="submit" class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">
							{{ auth()->user()->following($user) ? 'Unfollow Me' : 'Follow Me' }}
						</button>
					</form>
				@endif
			</div>
		</div>

		<p class="text-sm">
			i am james i am jamesi am jamesi am jamesi am jamesi am jamesi am jamesi am jamesi am jamesi am jamesi am jamesi am jamesi am jamesi am jamesi am jamesi am jamesi am jamesi am jamesi am jamesi am jamesi am james
		</p>
	</header>

	{{-- @include('_timeline', [
		'tweets' => $user->tweets
	]) --}}
	@include('_timeline', [
		'tweets' => $tweets
	])
@endsection
