@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row111">
                <div class="col-md-10">
                    <div class="header" style="text-align:center;margin-bottom:20px;color:#2b7691;">
                                <h4 class="title" >Create Position</h4>
                    </div>
                    <div class="card1">
                        
                        <div class="content">
                        <form action="{{action('PositionController@store')}}" method="POST">
                            {{ csrf_field() }}
                            @method('POST')
                                <div class="row1">
                                    <div class="col-md-5">
                                        <div class="form-group1">
                                            <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Company" value="">
                                        </div>
                                    </div>
                                                                      
                                </div>

                                <div class="row1">
                                    <div class="col-md-6">
                                        <div class="form-group1">
                                            <label>Department</label>
                                            <select class="form-control select md-form" name="department">
                                                <option value="" disabled selected>Department</option>
                                                @foreach ($departments as $department)                                                    
                                                    <option value="{{$department->id}}">{{$department->name}}</option>
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