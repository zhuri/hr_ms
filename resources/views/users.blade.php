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
                                    <th class="col-md-2">ID</th>                                
                                    <th class="col-md-2">Name</th>
                                    <th class="col-md-2">Email</th>
                                    <th class="col-md-3">Department</th>
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
                                                <a href="{{ route('users.get', $user->id) }}" class="btn btn-info btn-fill">Edit</a>
                                                <a href="{{ action('UserController@destroy', $user->id) }}" class="btn btn-danger btn-fill">Delete</a>
                                            </td>                               
                                        </tr>
                                    @endforeach                               
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            @include('partials.chat')
                        </div>
                    </div>
                </div>
            </div>                        
        </div>
    </div>
</div>
    
@endsection