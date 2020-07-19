@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-right">
            <img src="/storage/{{$post->image}}" width="400" height="300">
        </div>
        <!-- <div><img src = "/storage/{{ $post->user->profile->image}}"></div> //asi podemos obtener co relashionships el profile image -->
        <div class="col-md-4">
            <div class="d-flex">
                <h3><strong>
                            <a class="text-dark"
                             style="text-decoration:none"
                             href="/profile/{{$post->user->id}}">{{ $post->user->username }}</a>
                    </strong>
                </h3>
                <a href="" class="p-2">Follow</a>
            </div>
            <hr>
            <p>{{ $post->caption }}
        </div>
    </div>
</div>
@endsection