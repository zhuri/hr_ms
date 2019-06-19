@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row111">
                <div class="col-md-10">
                    <div class="header" style="text-align:center;margin-bottom:20px;color:#2b7691;">
                                <h4 class="title" >Edit Recruitment</h4>
                    </div>
                    <div class="card1">
                        
                        <div class="content">
                        <form action="{{action('RecruitmentController@update', $recruitment->id)}}" method="POST">
                            {{ csrf_field() }}
                            @method('POST')
                                <div class="row1">
                                    <div class="col-md-5">
                                        <div class="form-group1">
                                            <label>Name</label>
                                            <input disabled type="text" name="full_name" class="form-control1" placeholder="Company" value="{{ $recruitment->first_name. " " . $recruitment->last_name }}">
                                            <input type="hidden" name="name" class="form-control1" placeholder="Company" value="{{ $recruitment->first_name. " " . $recruitment->last_name }}">
                                            <input type="hidden" name="position_id" class="form-control1" placeholder="Company" value="{{ $recruitment->position_id }}">                                        
                                        </div>
                                    </div>                                                               
                                </div>

                                <div class="row1">
                                    <div class="col-md-6">
                                        <label>Position</label>
                                        <select disabled class="form-control select md-form" name="position">
                                                <option value="" disabled selected>Position</option>
                                                @foreach ($positions as $position)                                                    
                                                    <option value="{{$position->id}}" {{$position->id == $recruitment->position_id ? "selected": ""}}>{{$position->name}}</option>
                                                @endforeach                                            
                                        </select>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group1">
                                            <label>Status</label>
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
                                    <div class="form-group1 note1">
                                        <label for="note">Notes</label>
                                        <textarea name="notes" id="note" cols="100" rows="5" style="border-radius:1%">{{$recruitment->notes}}</textarea>
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