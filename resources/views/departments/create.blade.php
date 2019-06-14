@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">New Department</h4>
                        </div>
                        <div class="content">
                        <form action="{{action('DepartmentController@store')}}" method="POST">
                            {{ csrf_field() }}
                            @method('POST')
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Department name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Department name" value="">
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