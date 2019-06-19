@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="header">
                        <div class="row">
                            <div class="col-md-7"></div>
                            <div class="col-md-2">
                                @if(Auth::user()->role_id != 3)
                                <a style="margin-bottom:10px;" class="btn btn-outline-secondary col-md-12" href="{{ action('DepartmentController@create') }}">Add new</a>
                                @endif
                            </div>                        
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>                                
                                    <th >Id</th>
                                    <th >Name</th>
                                </thead>
                                <tbody>
                                    @foreach ($department as $dep)
                                        <tr>                                    
                                            <td>{{$dep->id}}</td>
                                            <td>{{$dep->name}}</td>   
                                            <td style="width:150px;">
                                                @if(Auth::user()->role_id != 3)
                                                <a href="{{ action('DepartmentController@show', $dep->id) }}" class="btn btn-fill" style="background-color:#66b3ff; color:white;">Edit</a>
                                                <a href="{{ action('DepartmentController@destroy', $dep->id) }}" class="btn btn-fill" style="background-color:#d11a2a; color:white;">Delete</a>
                                                @endif
                                            </td>                               
                                        </tr>
                                    @endforeach                               
                                </tbody>
                            </table>
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
    </div>
</div>
    
@endsection