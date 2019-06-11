@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
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
                
            </div>
        </div>
    </div>
@endsection