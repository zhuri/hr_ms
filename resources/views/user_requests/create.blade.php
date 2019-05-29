@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">New Request</h4>
                        </div>
                        <div class="content">
                        <form action="{{action('UserRequestController@store')}}" method="POST">
                            {{ csrf_field() }}
                            @method('POST')
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">   
                                            <label>Date from</label>                                         
                                            <input type="date" name="date_from" class="form-control" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date to</label>
                                        <input type="date" name="date_to" class="form-control" placeholder="" value="">
                                        </div>
                                    </div>                                                              
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <select class="form-control select md-form" name="type_id">
                                                <option value="" disabled selected>Type</option>
                                                @foreach ($request_types as $type)                                                    
                                                    <option value="{{$type->id}}">{{ucfirst($type->name)}}</option>
                                                @endforeach                                            
                                        </select>
                                    </div>                                                                                                      
                                </div>      
                                <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="note">Details</label>
                                                <textarea name="details" id="note" cols="100" rows="10"></textarea>
                                            </div>
                                    </div>  
                                </div>                                                                                
                                <input type="submit" class="btn btn-info btn-fill pull-right"/>
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