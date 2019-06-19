@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row1111">
                <div class="col-md-10">
                    <div class="header" style="text-align:center;margin-bottom:20px;color:#2b7691;">
                                <h4 class="title" >Edit Report</h4>
                    </div>
                    <div class="card1">
                        
                        <div class="content">
                        <form action="{{action('ReportType@update', $report->id)}}" method="POST">
                            {{ csrf_field() }}
                            @method('POST')
                                <div class="row1">
                                    <div class="col-md-5">
                                        <div class="form-group1">
                                            <label>Id</label>
                                        <input type="text" name="id" class="form-control" placeholder="Company" value="{{ $report->id }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group1">
                                            <label>Description</label>
                                        <input type="text" name="description" class="form-control" placeholder="Username" value="{{ $report->description }}">
                                        </div>
                                    </div>                                    
                                </div>

                                <div class="row1">
                                    <div class="col-md-6">
                                        <div class="form-group1">
                                            <label>Report Type</label>
                                            <select class="form-control select md-form" name="reporttype">
                                                <option value="" disabled selected>Department</option>
                                                @foreach ($reporttype as $reporttype)                                                    
                                                    <option value="{{$reporttype->id}}" {{$reporttype->id == $report->type_id ? "selected" : ""}}>{{$reporttype->name}}</option>
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
                                            <option value="{{$user->id}}" {{$user->id == $report->user_id ? "selected" : ""}}>{{$user->email}}</option>
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