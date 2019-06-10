<!-- (USERS) KOPJA NGA EDIT TASK TO BE MODIFIED -->


@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit User</h4>
                        </div>
                        <div class="content">
                        <form action="{{action('UserController@update', $users->id)}}" method="POST">
                            {{ csrf_field() }}
                            @method('POST')
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $users->name }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $users->email }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
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

                                <input type="submit" class="btn btn-info btn-fill pull-right"/>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                        <div class="card">
                                <div class="header">
                                    <h4 class="title">Edit User Details</h4>
                                </div>
                                <div class="content">
                                {{-- <form action="{{action('UserMetadataController@update', $user_metadata->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    @method('POST')
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Street</label>
                                                <input type="text" name="street" class="form-control" placeholder="Street" value="{{ $user_metadata->street }}">
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="row">
                                            <div >
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" name="city" class="form-control" placeholder="City" value="{{ $user_metadata->city }}">
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="row">
                                            <div class="col-md-5">
                                                    <label>Country</label>
                                                    <input type="text" name="country" class="form-control" placeholder="Country" value="{{ $user_metadata->country }}">
                                            </div>
                                        </div>  
        
                                        <input type="submit" class="btn btn-info btn-fill pull-right"/>
                                        <div class="clearfix"></div>
                                    </form> --}}
                                </div>
                        </div>
                </div>
                

            </div>
        </div>
    </div>
@endsection