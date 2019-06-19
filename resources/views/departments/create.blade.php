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
                                        <input type="text" name="name" class="form-control" placeholder="First name" value="">
                                        </div>
                                    </div>                                                             
                                </div>                           
                                <input type="submit" class="btn btn-info btn-fill pull-right"/>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </div>
@endsection