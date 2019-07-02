@extends('layouts.app')
@section('content')
<div class="content" style="">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="header">
                    <div class="row">
                    <div class="col-md-7" style="margin-bottom:10px;">
                            <input class="col-md-5" style="margin-left:15px;margin-bottom:18px;padding:5px 10px;" type="text" id="myInput" onkeyup="myFunction2()" placeholder="Search for tasks.." title="Type in a name">
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
                                    <th>Department</th>
                                    <th>User</th>                                
                                    <th>Operations</th>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                    <?php $taskId = $task->id; ?>
                                     <!-- Modal -->
                                    <div class="modal fade" id="myModal<?php echo $taskId ?>" role="dialog">
                                        <div class="modal-dialog">
                                        
                                        <!-- Modal content-->
                                        <div class="modal-content col-md-10" style="vertical-align:center;padding-left:0px;padding-right:0px;border-radius:4px;margin-top:15%;">
                                            <div class="modal-header" style="background-color: #fbfafa; color: gray;">
                                                <h4 class="modal-title col-md-10"><?php echo strtoupper($task->name); ?></h4>
                                                <button type="button" class="close col-md-2" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                    <p>{{$task->description}}</p>
                                            </div>
                                        </div>
                                        
                                        </div>
                                    </div>
                                        <tr>                                    
                                            <td data-toggle="modal" data-target="#myModal<?php echo $taskId ?>">{{$task->name}}</td>
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