@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row111">
                <div class="col-md-10">
                    <div class="header" style="text-align:center;margin-bottom:20px;color:#2b7691;">
                                <h4 class="title" >Create Report</h4>
                    </div>
                    <div class="card1">
                        
                        <div class="content">
                        <form action="{{action('ReportController@store')}}" method="POST">
                            {{ csrf_field() }}
                            @method('POST')
                                <div class="row1">
                                    <!-- <div class="col-md-5">
                                        <div class="form-group1">
                                            <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Company" value="">
                                        </div>
                                    </div>-->
                                    <div class="col-md-3">
                                        <div class="form-group1">
                                            <label>Description</label>
                                        <input type="text" name="description" class="form-control" placeholder="Username" value="">
                                        </div>
                                    </div>                                    
                                </div>

                                <div class="row1">
                                    <div class="col-md-6">
                                        <div class="form-group1">
                                            <label>Report Type</label>
                                            <select class="form-control select md-form" name="reporttype">
                                                <option value="" disabled selected>ReportType</option>
                                                @foreach ($reporttype as $reporttype)                                                    
                                                    <option value="{{$reporttype->id}}">{{$reporttype->name}}</option>
                                                @endforeach                                            
                                            </select>
                                        </div>
                                    </div>     
                                    <div class="col-md-6">
                                        <div class="form-group1">
                                            <label>User</label>
                                            <select class="form-control select md-form" name="user">
                                                <option value="" disabled selected>User</option>                                                
                                                @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{$user->email}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>                               
                                </div>                                
                                <div class="row">
                                    <div class="col-md-2">
                                        <input style="margin-top:15px;" class="btn btn-outline-success col-md-12" type="submit">
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