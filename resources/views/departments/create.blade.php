@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row111">
                <div class="col-md-10">
                    <div class="header" style="text-align:center;margin-bottom:20px;color:#2b7691;">
                                <h4 class="title" >Create Department</h4>
                    </div>
                    <div class="card1">
                        <div class="content">
                        <form action="{{action('DepartmentController@store')}}" method="POST">
                            {{ csrf_field() }}
                            @method('POST')
                                <div class="row1">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Department name</label>
                                        <input type="text" name="name" class="form-control" placeholder="First name" value="">
                                        </div>
                                    </div>                                                             
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input style="margin-top:15px;" class="btn btn-outline-success col-md-12" type="submit">
                                    </div>
                                    <div class="col-md-2">
                                        <button style="margin-top:15px;" class="btn btn-outline-light col-md-12"><a style="text-decoration:none;color:gray;" href="{{ action('DepartmentController@index') }}">Cancel</a></button>
                                    </div>                         
                                </div>                             
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </div>
@endsection