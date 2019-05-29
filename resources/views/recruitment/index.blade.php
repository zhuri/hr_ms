@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="header">
                        <div class="row">
                            <div class="col-md-2">
                                <a class="btn btn-default btn-block" href="{{ action('RecruitmentController@create') }}">Add new</a>
                            </div>                        
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>                                
                                    <th class="col-md-2">Status</th>
                                    <th class="col-md-2">Applicant</th>
                                    <th class="col-md-2">Position</th>
                                    <th class="col-md-2">Date started</th>                                
                                    <th>Operations</th>
                                </thead>
                                <tbody>
                                    @foreach ($recruitments as $rec)
                                        <tr>                                    
                                            <td>{{$rec->status}}</td>
                                            <td>{{$rec->first_name . " " . $rec->last_name}}</td>
                                            <td>{{$rec->position}}</td>   
                                            <td>{{$rec->created_at}}</td>     
                                            <td>
                                                <a href="{{ action('RecruitmentController@show', $rec->id) }}" class="btn btn-info btn-fill">Edit</a>
                                                <a href="{{ action('RecruitmentController@destroy', $rec->id) }}" class="btn btn-danger btn-fill">Delete</a>
                                            </td>                               
                                        </tr>
                                    @endforeach                               
                                </tbody>
                            </table>
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
    </div>
</div>
    
@endsection