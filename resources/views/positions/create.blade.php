@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row11">
                <div class="col-md-10">
                    <div class="header" style="text-align:center;margin-bottom:20px;color:#2b7691;">
                                <h4 class="title" >New Position Opening</h4>
                    </div>
                    <div class="card1">
                        
                        <div class="content">
                        <form action="{{action('PositionController@store')}}" method="POST">
                            {{ csrf_field() }}
                            @method('POST')
                                <div class="row1">
                                    <div class="col-md-3">
                                        <div class="form-group1">
                                            <label>Position name</label>
                                        <input type="text" name="name" class="form-control" placeholder="" value="">
                                        </div>
                                    </div> 

                                </div>

                                <div class="row1">
                                    <div class="col-md-6">
                                        <label>Department</label>
                                        <select class="form-control select md-form" name="department_id">
                                                <option value="" disabled selected>Department</option>
                                                @foreach ($departments as $dpt)                                                    
                                                    <option value="{{$dpt->id}}">{{$dpt->name}}</option>
                                                @endforeach                                            
                                        </select>
                                    </div>                                                                                                   
                                </div>                        
                                <div class="row">
                                    <div class="col-md-2">
                                        <input style="margin-top:15px;" class="btn btn-outline-success col-md-12" type="submit">
                                    </div>
                                    <div class="col-md-2">
                                        <button style="margin-top:15px;" class="btn btn-outline-light col-md-12"><a style="text-decoration:none;color:gray;" href="{{ action('PositionController@index') }}">Cancel</a></button>
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