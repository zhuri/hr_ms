@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit Task</h4>
                        </div>
                        <div class="content">
                            <form>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Name (disabled)</label>
                                        <input type="text" name="name" class="form-control" disabled placeholder="Company" value="{{ $task->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Description</label>
                                        <input type="text" name="description" class="form-control" placeholder="Username" value="{{ $task->description }}">
                                        </div>
                                    </div>                                    
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control select md-form">
                                                <option value="" disabled selected>Department</option>
                                                @foreach ($departments as $department)                                                    
                                                    <option value="{{$department->id}}" {{$department->id == $task->department_id ? "selected" : ""}}>{{$department->name}}</option>
                                                @endforeach                                            
                                            </select>
                                        </div>
                                    </div>     
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control select md-form">
                                                <option value="" disabled selected>User</option>                                                
                                                @foreach ($users as $user)
                                            <option value="{{$user->id}}" {{$user->id == $task->user_id ? "selected" : ""}}>{{$user->email}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>                               
                                </div>                                
                                <button type="submit" class="btn btn-info btn-fill pull-right">Update</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-user">
                        <div class="image">
                            <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                        </div>
                        <div class="content">
                            <div class="author">
                                 <a href="#">
                                <img class="avatar border-gray" src="assets/img/faces/face-3.jpg" alt="..."/>

                                  <h4 class="title">Mike Andrew<br />
                                     <small>michael24</small>
                                  </h4>
                                </a>
                            </div>
                            <p class="description text-center"> "Lamborghini Mercy <br>
                                                Your chick she so thirsty <br>
                                                I'm in that two seat Lambo"
                            </p>
                        </div>
                        <hr>
                        <div class="text-center">
                            <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                            <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                            <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection