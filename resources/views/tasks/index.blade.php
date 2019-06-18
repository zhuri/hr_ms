@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="header">
                    <div class="row">
                    <div class="col-md-7" style="margin-bottom:10px;">
                            <input class="col-md-5" style="margin-left:15px;margin-bottom:18px;padding:5px 10px;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for usernames.." title="Type in a name">
                            </div>
                            <div class="col-md-2">
                            <a style="" class="btn btn-outline-secondary col-md-12" href="{{ action('TaskController@create') }}">Add new</a>
                            </div>                        
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped" id="myTable">
                                <thead>                                
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Department</th>
                                    <th>User</th>                                
                                    <th>Operations</th>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>                                    
                                            <td>{{$task->name}}</td>
                                            <td>{{$task->description}}</td>
                                            <td>{{$task->department}}</td>   
                                            <td>{{$task->email ? $task->email : ""}}</td>     
                                            <td style="width:150px;">
                                                <a href="{{ action('TaskController@show', $task->id) }}" class="btn btn-fill" style="background-color:#66b3ff; color:white;">Edit</a>
                                                @if(Auth::user()->role_id != 3)
                                                <a href="{{ action('TaskController@destroy', $task->id) }}" class="btn btn-fill" style="background-color:#d11a2a; color:white;">Delete</a>
                                                @endif
                                            </td>                               
                                        </tr>
                                    @endforeach                               
                                </tbody>
                            </table>
                            {{-- <div class="col-md-12">
                                        @if(Session::has('message'))
                                        <div class="alert alert-warning" role="alert">
                                            <p>{{ Session::get('message') }}</p>
                                        </div>
                                    @endif
                            </div> --}}
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