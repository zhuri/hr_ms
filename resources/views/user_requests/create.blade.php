@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row11">
                <div class="col-md-10">
                    <div class="header" style="text-align:center;margin-bottom:20px;color:#2b7691;">
                                <h4 class="title" >New Request</h4>
                    </div>
                    <div class="card1">
                        
                        <div class="content">
                        <form action="{{action('UserRequestController@store')}}" method="POST">
                            {{ csrf_field() }}
                            @method('POST')
                                <div class="row1">
                                    <div class="col-md-5">
                                        <div class="form-group1">   
                                            <label>Date from</label>                                         
                                            <input type="date" name="date_from" class="form-control" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group1">
                                            <label>Date to</label>
                                        <input type="date" name="date_to" class="form-control" placeholder="" value="">
                                        </div>
                                    </div>                                                              
                                </div>

                                <div class="row1">
                                    <div class="col-md-6">
                                    <label>Type</label>
                                        <select style="width:375px;" class="form-control select md-form" name="type_id">
                                                <option value="" disabled selected>Type</option>
                                                @foreach ($request_types as $type)                                                    
                                                    <option value="{{$type->id}}">{{ucfirst($type->name)}}</option>
                                                @endforeach                                            
                                        </select>
                                    </div>                                                                                                      
                                </div>      
                                <div class="row1">
                                    <div class="col-md-6">
                                            <div class="form-group1">
                                                <label for="note">Details</label>
                                                <textarea name="details" id="note" cols="100" rows="5" style="border-radius:1%;"></textarea>
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
                <div class="col-md-4">
                    <div>
                        @include('partials.chat')
                    </div>     
                </div>

            </div>
        </div>
    </div>
@endsection