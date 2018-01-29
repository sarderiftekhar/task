@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Profile</div>

                    <div class="panel-body">
                        @if(session('message'))
                            <h3 style="color: green;">
                                {{session('message')}}
                            </h3>
                        @endif

                            <form class="form-horizontal" method="POST" action="{{ route('profile') }}">
                                {{ csrf_field() }}


                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title" class="col-md-4 control-label">Title</label>

                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control" name="title" value="{{ $user->title }}" required autofocus>

                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('forename') ? ' has-error' : '' }}">
                                    <label for="forename" class="col-md-4 control-label">Forename</label>

                                    <div class="col-md-6">
                                        <input id="forename" type="text" class="form-control" name="forename" value="{{ $user->forename }}" required autofocus>

                                        @if ($errors->has('forename'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('forename') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                                    <label for="surname" class="col-md-4 control-label">Surname</label>

                                    <div class="col-md-6">
                                        <input id="surname" type="text" class="form-control" name="surname" value="{{ $user->surname }}" required autofocus>

                                        @if ($errors->has('surname'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                    <label for="datepicker" class="col-md-4 control-label">Date Of Birth</label>

                                    <div class="col-md-6">
                                        <input id="datepicker" type="text" class="form-control" name="dob" value="{{ $user->dob }}" required autofocus>

                                        @if ($errors->has('dob'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                    <label for="gender" class="col-md-4 control-label">Gender</label>

                                    <div class="col-md-6">
                                        <label style="margin-right: 20px;"><input id="gender" type="radio" class="form-control" name="gender" value="Male" @if($user->gender == "Male") checked @endif>Male</label>
                                        <label><input id="gender" type="radio" class="form-control" name="gender" value="Female" @if($user->gender == "Female") checked @endif >Female</label>

                                        @if ($errors->has('gender'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Update profile
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
