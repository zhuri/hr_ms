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
                                    <th class="col-md-2">Type</th>
                                    <th class="col-md-2">User</th>
                                    <th class="col-md-2">Date from</th>                                    
                                    <th class="col-md-2">Date To</th>  
                                    <th class="col-md-2">Created</th>                              
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
                                            <td>
                                                <a href="{{ action('UserRequestController@show', $rec->id) }}" class="btn btn-info btn-fill">Edit</a>
                                                <a href="{{ action('UserRequestController@destroy', $rec->id) }}" class="btn btn-danger btn-fill">Delete</a>
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