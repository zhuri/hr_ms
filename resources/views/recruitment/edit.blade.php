@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Edit Recruitment</h4>
                        </div>
                        <div class="content">
                        <form action="{{action('RecruitmentController@update', $recruitment->id)}}" method="POST">
                            {{ csrf_field() }}
                            @method('POST')
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Name</label>
                                        <input disabled type="text" name="full_name" class="form-control" placeholder="Company" value="{{ $recruitment->first_name. " " . $recruitment->last_name }}">
                                        <input type="hidden" name="name" class="form-control" placeholder="Company" value="{{ $recruitment->first_name. " " . $recruitment->last_name }}">
                                        <input type="hidden" name="position_id" class="form-control" placeholder="Company" value="{{ $recruitment->position_id }}">                                        
                                        </div>
                                    </div>                                                               
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <select disabled class="form-control select md-form" name="position">
                                                <option value="" disabled selected>Position</option>
                                                @foreach ($positions as $position)                                                    
                                                    <option value="{{$position->id}}" {{$position->id == $recruitment->position_id ? "selected": ""}}>{{$position->name}}</option>
                                                @endforeach                                            
                                        </select>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control select md-form" name="status_id">
                                                <option value="" disabled selected>Status</option>
                                                @foreach ($statuses as $status)                                                    
                                                    <option value="{{$status->id}}" {{$status->id == $recruitment->status_id ? "selected": ""}}>{{$status->name}}</option>
                                                @endforeach                                            
                                            </select>
                                        </div>
                                    </div>                                                                  
                                </div> 

                                <div class="row">                                    
                                    <div class="form-group">
                                        <label for="note">Notes</label>
                                        <textarea name="notes" id="note" cols="100" rows="10">{{$recruitment->notes}}</textarea>
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