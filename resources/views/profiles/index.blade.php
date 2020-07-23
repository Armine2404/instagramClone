@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-3 p-5">
            @if($user->profile->image)
            <img src="/storage/{{$user->profile->image}}" class="rounded-circle" width="180" />
            @else
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0a/Gnome-stock_person.svg/1024px-Gnome-stock_person.svg.png"
                class="rounded-circle" width="180" />
            @endif
        </div>
        <div class="col-md-9 pt-5">
            <div class="d-flex justify-content-between">
                <div class="d-flex pb-3">
                    <div class="h4 ">{{$user->username}}</div>
                    <follow-button user-id="{{ $user->id }}" follows = "{{ $follows }}"></follow-button>
                </div>
                @can('update', $user->profile)
                <a href="/p/create">Add new post</a>
                @endcan
            </div>
            @can('update', $user->profile)
            <a href="/profile/{{$user->id}}/edit">Edit profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $countPosts }}</strong> posts</div>
                <div class="pr-4"><strong>{{ $countFollowers }}</strong> followers</div>
                <div class="pr-4"><strong>{{ $countFollowing }}</strong> following</div>
            </div>
            <h4 class = "username" >{{$user->profile->title}}</h4>
            <div>{{$user->profile->description}}</div>
            <h5><a href="">{{$user->profile->url}}</a></h5>
        </div>
    </div>
    <div class="row">
        @foreach($user->posts as $post)
        <div class="col-sm-4 pb-4">
            <a href="/p/{{ $post->id }}">
                <img src="/storage/{{$post->image}}" width="350" height="300">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection