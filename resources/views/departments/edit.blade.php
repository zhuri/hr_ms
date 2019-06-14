@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit Departmentment</h4>
                        </div>
                        <div class="content">
                        <form action="{{action('DepartmentController@update', $department->id)}}" method="POST">
                            {{ csrf_field() }}
                            @method('POST')
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Name</label>
                                        <input disabled type="text" name="full_name" class="form-control" placeholder="Company" value="{{ $department->name}}">
                                                                            
                                        </div>
                                    </div>                                                               
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            
                                        </div>
                                    </div>                                                                  
                                </div> 

                                <div class="row">                                    
                                    <div class="form-group">
                                        
                                    </div> 
                                </div>                            
                                <input type="submit" class="btn btn-info btn-fill pull-right"/>
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