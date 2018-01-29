@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Address</div>

                <div class="panel-body">
                    @if(session('message'))
                        <h3 style="color: green;">
                            {{session('message')}}
                        </h3>
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('address.store') }}">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('address_line_1') ? ' has-error' : '' }}">
                            <label for="address_line_1" class="col-md-4 control-label">Address Line 1</label>

                            <div class="col-md-6">
                                <input id="address_line_1" type="text" class="form-control" name="address_line_1" value="{{ old('address_line_1') }}" required autofocus>

                                @if ($errors->has('address_line_1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_line_1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address_line_2') ? ' has-error' : '' }}">
                            <label for="address_line_2" class="col-md-4 control-label">Address Line 2</label>

                            <div class="col-md-6">
                                <input id="address_line_2" type="text" class="form-control" name="address_line_2" value="{{ old('address_line_2') }}"  autofocus>

                                @if ($errors->has('address_line_2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_line_2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('town') ? ' has-error' : '' }}">
                            <label for="town" class="col-md-4 control-label">Town</label>

                            <div class="col-md-6">
                                <input id="town" type="text" class="form-control" name="town" value="{{ old('town') }}" required autofocus>

                                @if ($errors->has('town'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('town') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('county') ? ' has-error' : '' }}">
                            <label for="county" class="col-md-4 control-label">County</label>

                            <div class="col-md-6">
                                <input id="county" type="text" class="form-control" name="county" value="{{ old('county') }}" autofocus>

                                @if ($errors->has('county'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('county') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="country" class="col-md-4 control-label">Country</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}" required autofocus>

                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('post_code') ? ' has-error' : '' }}">
                            <label for="post_code" class="col-md-4 control-label">Post Code</label>

                            <div class="col-md-6">
                                <input id="post_code" type="text" class="form-control" name="post_code" value="{{ old('post_code') }}" required autofocus>

                                @if ($errors->has('post_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('from_date') ? ' has-error' : '' }}">
                            <label for="datepicker" class="col-md-4 control-label">From Date</label>

                            <div class="col-md-6">
                                <input id="datepicker" type="text" class="form-control" name="from_date" value="{{ old('from_date') }}" required autofocus>

                                @if ($errors->has('from_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('from_date') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group{{ $errors->has('until_date') ? ' has-error' : '' }}">
                            <label for="datepicker1" class="col-md-4 control-label">Until Date</label>

                            <div class="col-md-6">
                                <input id="datepicker1" type="text" class="form-control" name="until_date" value="{{ old('until_date') }}" required autofocus>

                                @if ($errors->has('until_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('until_date') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add new address
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
