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
                                <button class="btn btn-default btn-block">Add new</button>
                            </div>                        
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>ID</th>                                
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Operations</th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->department}}</td>     
                                            <td>
                                                <a href="{{ action('UserController@show', $user->id) }}" class="btn btn-info btn-fill">Edit</a>
                                                <a href="{{ action('UserController@destroy', $user->id) }}" class="btn btn-danger btn-fill">Delete</a>
                                                <a href="{{ action('ReportController@create', $user->id) }}" class="btn btn-warning btn-fill">Add Report</a>                                                
                                            </td>                               
                                        </tr>
                                    @endforeach                               
                                </tbody>
                            </table>
                            <div class="col-md-12">
                                    {{-- <div class="col-md-"> --}}
                                        @if(Session::has('message'))
                                        <div class="alert alert-danger" role="alert">
                                            <p>{{ Session::get('message') }}</p>
                                        </div>
                                    {{-- </div> --}}
                                    @endif
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

    </div>
</div>
    
@endsection