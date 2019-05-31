@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="header">
                        <div class="row">
                            <div class="col-md-2">
                                <a class="btn btn-default btn-block" href="{{ action('UserRequestController@create') }}">Add new</a>
                            </div>                        
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>                                
                                    <th class="">Type</th>
                                    <th class="">User</th>
                                    <th class="col-md-2">Date from</th>                                    
                                    <th class="col-md-2">Date To</th>  
                                    <th class="col-md-2">Created</th>  
                                    <th class="col-md-2">Status</th>  
                                    <th>Operations</th>
                                </thead>
                                <tbody>
                                    @foreach ($user_requests as $rec)
                                        <tr>                                    
                                            <td>{{$rec->type}}</td>
                                            <td>{{$rec->user}}</td>
                                            <td>{{$rec->date_from}}</td>   
                                            <td>{{$rec->date_to}}</td>     
                                            <td>{{$rec->created_at}}</td>   
                                            <td>{{$rec->status}}</td>  
                                            <td>
                                                @if($rec->status_id == 1)
                                                @if(Auth::user()->role_id != 3)
                                                    <a href="{{ action('UserRequestController@approve', $rec->id) }}" class="btn btn-info btn-fill">Approve</a> 
                                                    <a href="{{ action('UserRequestController@deny', $rec->id) }}" class="btn btn-danger btn-fill">Deny</a>                                                    
                                                @else
                                                    <a href="{{ action('UserRequestController@show', $rec->id) }}" class="btn btn-info btn-fill">Edit</a>
                                                    <a href="{{ action('UserRequestController@destroy', $rec->id) }}" class="btn btn-danger btn-fill">Delete</a>
                                                @endif
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