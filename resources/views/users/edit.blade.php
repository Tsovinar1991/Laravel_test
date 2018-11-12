@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Profile</div>
                    <div class="panel-body">
                        {{--@if(session()->has('success'))--}}
                        {{--<div class="alert alert-success">--}}
                        {{--{{ session()->get('success') }}--}}
                        {{--</div>--}}
                        {{--@endif--}}
                        <form class="form-horizontal" role="form" method="POST" action="{{ action('UserController@update') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PUT">

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input id="edit_name" type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                <label for="mobile" class="col-md-4 control-label">Mobile Number</label>

                                <div class="col-md-6">
                                    <input id="edit_mobile" type="text" class="form-control" name="mobile" value="{{Auth::user()->mobile}}">

                                    @if ($errors->has('mobile'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="user_image" class="col-md-4 control-label" >Profile Image</label>
                                <input id = "user_image" type="file" name="user_image" class="custom-file-input" >
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
