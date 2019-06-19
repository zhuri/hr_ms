@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">{{$department->name}}</h4>
                        </div>
                        <div class="content">
                            <form action="{{action('DepartmentController@update', $department->id)}}" method="POST">
                                {{ csrf_field() }}
                                @method('POST')
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Name</label>
                                            <input enabled type="text" name="name" class="form-control" placeholder="Company" value="{{ $department->name}}">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-info"/>
                                    <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


