@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="header">
                        <div class="row">                       
                        </div>
                    </div>
                    <div class="col-md-10">
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
                                            <td style="width:250px;">
                                                <a href="{{ action('UserController@show', $user->id) }}" class="btn btn-fill">Edit</a>
                                                @if(Auth::user()->role_id != 3)
                                                <a href="{{ action('UserController@destroy', $user->id) }}" class="btn btn-fill" style="background-color:#d11a2a; color:white;">Delete</a>
                                                @endif
                                                <a href="{{ action('ReportController@create', $user->id) }}" class="btn btn-fill" style="background-color:#5cd65c; color:white;">Add Report</a>                                                
                                            </td>                               
                                        </tr>
                                    @endforeach                               
                                </tbody>
                            </table>
                            <div class="col-md-10">
                                @if(Session::has('message'))
                                <div class="alert alert-danger" role="alert">
                                    <p>{{ Session::get('message') }}</p>
                                </div>
                                <script>
                                        $(document).ready(function(){
                                        $('.alert-danger').fadeIn().delay(1000).fadeOut();
                                        });
                                </script>
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