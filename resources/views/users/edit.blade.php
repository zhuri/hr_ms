<!-- (USERS) KOPJA NGA EDIT TASK TO BE MODIFIED -->


@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row111">
                <div class="col-md-10">
                    <div class="header" style="text-align:center;margin-bottom:20px;color:#2b7691;">
                                <h4 class="title" >Edit User</h4>
                    </div>
                    <div class="card1">
                        
                        <div class="content">
                        <form action="{{action('UserController@update', $users->id)}}" method="POST">
                            {{ csrf_field() }}
                            @method('POST')
                                <div class="row1">
                                    <div class="col-md-5">
                                        <div class="form-group1">
                                            <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $users->name }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row1">
                                    <div class="col-md-5">
                                        <div class="form-group1">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $users->email }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row1">
                                    <div class="col-md-5">
                                        <div class="form-group1">
                                            <label>Department</label>
                                            <select class="form-control select md-form" name="department">
                                                <option value="" disabled selected>Department</option>
                                                @foreach ($departments as $department)                                                    
                                                    <option value="{{$department->id}}" {{$department->id == $users->department_id ? "selected" : ""}}>{{$department->name}}</option>
                                                @endforeach                                            
                                            </select>
                                        </div>
                                    </div>
                                </div>  

                                <div class="row">
                                    <div class="col-md-2">
                                        <input style="margin-top:15px;" class="btn btn-outline-success col-md-12" type="submit">
                                    </div> 
                                    <div class="col-md-2">
                                        <button style="margin-top:15px;" class="btn btn-outline-light col-md-12"><a style="text-decoration:none;color:gray;" href="{{ action('UserController@index') }}">Cancel</a></button>
                                    </div>                        
                                </div>
                                <div class="clearfix"></div>
                            </form>
                            <form action="{{action('UserController@updatePassword')}}" method="POST">         
                                {{ csrf_field() }}                       
                                <input type="text" name="user_id" class="form-control" placeholder="Email" value="{{ $users->id }}">
                                <input style="margin-top:15px;" class="btn btn-outline-success col-md-12" type="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection