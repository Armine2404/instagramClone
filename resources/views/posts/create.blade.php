@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <x-alert />
        <!-- left column -->
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary shadow">
                <div class="card-header text-center">
                    <h3 class="card-title">Add New Post</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/p" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row justify-content-center">
                            <div class="col-md-11" id = "app">
                                <label for="caption" class="col-md-4 col-form-label">Post Caption</label>
                                <input 
                                    id="caption" 
                                    type="text"
                                    class="form-control{{ $errors->has('caption') ? ' is-invalid' : '' }}"
                                    name="caption" value="{{ old('caption') }}"
                                    autocomplete="caption" 
                                    autofocus
                                   >
                                @if ($errors->has('caption'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('caption') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-11">
                                <label for="image" class="col-md-4 col-form-label">Post Image</label>

                                <input type="file" class="form-control-file" id="image" name="image">

                                @if ($errors->has('image'))
                                <strong>{{ $errors->first('image') }}</strong>
                                @endif
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">ADD NEW POST</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

@endsection
