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
                                <a class="btn btn-default btn-block" href="{{ action('TaskController@create') }}">Add new</a>
                            </div>                        
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>                                
                                    <th class="col-md-2">Name</th>
                                    <th class="col-md-2">Description</th>
                                    <th class="col-md-2">Department</th>
                                    <th class="col-md-2">User</th>                                
                                    <th>Operations</th>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>                                    
                                            <td>{{$task->name}}</td>
                                            <td>{{$task->description}}</td>
                                            <td>{{$task->department}}</td>   
                                            <td>{{$task->email ? $task->email : ""}}</td>     
                                            <td>
                                                <a href="{{ action('TaskController@show', $task->id) }}" class="btn btn-info btn-fill">Edit</a>
                                                <a href="{{ action('UserController@destroy', $task->id) }}" class="btn btn-danger btn-fill">Delete</a>
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