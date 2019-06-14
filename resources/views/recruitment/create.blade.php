@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row11">
                <div class="col-md-10">
                    <div class="header" style="text-align:center;margin-bottom:20px;color:#2b7691;">
                                <h4 class="title" >New Recruitment</h4>
                    </div>
                    <div class="card1">
                        
                        <div class="content">
                        <form action="{{action('RecruitmentController@store')}}" method="POST">
                            {{ csrf_field() }}
                            @method('POST')
                                <div class="row1">
                                    <div class="col-md-5">
                                        <div class="form-group1">
                                            <label>First name</label>
                                        <input type="text" name="first_name" class="form-control" placeholder="First name" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group1">
                                            <label>Last name</label>
                                        <input type="text" name="last_name" class="form-control" placeholder="Last name" value="">
                                        </div>
                                    </div>                                       
                                                               
                                </div>

                                <div class="row1">
                                    <div class="col-md-6">
                                        <label>Position</label>
                                        <select class="form-control select md-form" name="position_id">
                                                <option value="" disabled selected>Position</option>
                                                @foreach ($positions as $position)                                                    
                                                    <option value="{{$position->id}}">{{$position->name}}</option>
                                                @endforeach                                            
                                        </select>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group1">
                                            <label>Status</label>
                                            <select class="form-control select md-form" name="status_id">
                                                <option value="" disabled selected>Status</option>
                                                @foreach ($statuses as $status)                                                    
                                                    <option value="{{$status->id}}">{{$status->name}}</option>
                                                @endforeach                                            
                                            </select>
                                        </div>
                                    </div>                                                                  
                                </div>                                
                                <div class="row">                                    
                                    <div class="form-group1 note1">
                                        <label for="note">Notes</label>
                                        <textarea name="notes" id="note" cols="100" rows="10" style="border-radius:1%"></textarea>
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