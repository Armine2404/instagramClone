@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <x-alert />
        <!-- left column -->
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary shadow">
                <div class="card-header text-center">
                    <h3 class="card-title">Edit Profile</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/profile/{{$user->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group row justify-content-center">
                            <div class="col-md-11">
                                <label for="title" class="col-md-4 col-form-label">Title</label>
                                <input id="title" type="text"
                                    class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                    name="title" value="{{ old('title') ?? $user->profile->title }}" autocomplete="title" autofocus>
                                @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-11">
                                <label for="description" class="col-md-4 col-form-label">Description</label>
                                <input id="title" type="text"
                                    class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                    name="description" value="{{ old('description') ?? $user->profile->description }}" autocomplete="description" autofocus>
                                @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-11">
                                <label for="url" class="col-md-4 col-form-label">URL</label>
                                <input id="title" type="text"
                                    class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}"
                                    name="url" value="{{ old('url') ?? $user->profile->url }}" autocomplete="url" autofocus>
                                @if ($errors->has('url'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('url') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-11">
                                <label for="image" class="col-md-4 col-form-label">Profile Image</label>

                                <input type="file" class="form-control-file" id="image" name="image">

                                @if ($errors->has('image'))
                                <strong>{{ $errors->first('image') }}</strong>
                                @endif
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Save Profile</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

@endsection