@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Address</div>

                <div class="panel-body">
                    @if(session('message'))
                        <h3 style="color: green;">
                            {{session('message')}}
                        </h3>
                    @endif

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Address Line 1</th>
                            <th>Town</th>
                            <th>Country</th>
                            <th>Post Code</th>
                            <th>From Date</th>
                            <th>Until Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($address as $a)
                        <tr>
                            <td>{{$a->address_line_1}}</td>
                            <td>{{$a->town}}</td>
                            <td>{{$a->country}}</td>
                            <td>{{$a->post_code}}</td>
                            <td>{{$a->from_date}}</td>
                            <td>{{$a->until_date}}</td>
                            <td>
                                {!! Form::open(['route'=>['address.destroy',$a->id],'method'=>'DELETE','style'=>'float:left; margin:0px; padding-right:5px;']) !!}
                                <button class="btn btn-danger" type="submit" onclick="return confirmDelete()" title="Delete">
                                    Delete<i class="halflings-icon white trash"></i>
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
