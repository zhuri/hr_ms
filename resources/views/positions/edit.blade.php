@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row111">
                <div class="col-md-10">
                    <div class="header" style="text-align:center;margin-bottom:20px;color:#2b7691;">
                                <h4 class="title" >Edit Positions</h4>
                    </div>
                    <div class="card1">
                        
                        <div class="content">
                        <form action="{{action('PositionController@update', $position->id)}}" method="POST">
                            {{ csrf_field() }}
                            @method('POST')
                                <div class="row1">
                                    <div class="col-md-5">
                                        <div class="form-group1">
                                            <label>Name</label>
                                            <input disabled type="text" name="name" class="form-control1" placeholder="Company" value="{{ $position->name }}">
                                            <input type="hidden" name="name" class="form-control1" placeholder="Company" value="{{ $position->name}}">
                                            <input type="hidden" name="department_id" class="form-control1" placeholder="Company" value="{{ $position->department_id }}">                                        
                                        </div>
                                    </div>                                                               
                                </div>

                                <div class="row1">
                                    <div class="col-md-6">
                                        <label>Department</label>
                                        <select disabled class="form-control select md-form" name="position">
                                                <option value="" disabled selected>Position</option>
                                                @foreach ($department as $department)                                                    
                                                    <option value="{{$department->id}}" {{$department->id == $position->department_id ? "selected": ""}}>{{$department->name}}</option>
                                                @endforeach                                            
                                        </select>
                                    </div>  
                                    <div class="col-md-6">
                                        
                                    </div>                                                                  
                                </div> 
                                <div class="row">                                    
                                    <div class="form-group1 note1">
                                       
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