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
                            <input class="col-md-5" style="margin-left:15px;margin-bottom:18px;padding:5px 10px;" type="text" id="myInput" onkeyup="myFunction2()" placeholder="Search for usernames.." title="Type in a name">
                            </div>
                            <div class="col-md-2">
                            <a style="" class="btn btn-outline-secondary col-md-12" href="{{ action('UserRequestController@create') }}">Add new</a>
                            </div>                        
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped" id="myTable">
                                <thead>                                
                                    <th class="">Type</th>
                                    <th class="">User</th>
                                    <th>Date from</th>                                    
                                    <th>Date To</th>  
                                    <th>Created</th>  
                                    <th>Status</th>  
                                    <th>Operations</th>
                                </thead>
                                <tbody>
                                    @foreach ($user_requests as $rec)
                                    <?php $recId = $rec->id; ?>
                                        <tr>                                    
                                            <td>{{$rec->type}}</td>
                                            <td data-toggle="modal" data-target="#myModal<?php echo $recId ?>">{{$rec->user}}</td>
                                            <td>{{$rec->date_from}}</td>   
                                            <td>{{$rec->date_to}}</td>     
                                            <td>{{$rec->created_at}}</td>   
                                            <td>{{$rec->status}}</td>  
                                            <td>
                                                @if($rec->status_id == 1)
                                                @if(Auth::user()->role_id != 3)
                                                    <a href="{{ action('UserRequestController@approve', $rec->id) }}" class="btn btn-fill" style="background-color:#4dff4d; color:white;">Approve</a> 
                                                    <a href="{{ action('UserRequestController@deny', $rec->id) }}" class="btn  btn-fill" style="background-color:#d11a2a; color:white;">Deny</a>                                                    
                                                @else
                                                    <a href="{{ action('UserRequestController@show', $rec->id) }}" class="btn btn-fill" style="background-color:#66b3ff; color:white;">Edit</a>
                                                    <a href="{{ action('UserRequestController@destroy', $rec->id) }}" class="btn btn-fill" style="background-color:#d11a2a; color:white;">Delete</a>
                                                @endif
                                                @endif                                                
                                            </td>
                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal<?php echo $recId ?>" role="dialog">
                                                <div class="modal-dialog">
                                                
                                                <!-- Modal content-->
                                                <div class="modal-content col-md-10" style="vertical-align:center;padding-left:0px;padding-right:0px;border-radius:4px;margin-top:15%;">
                                                    <div class="modal-header" style="background-color: #fbfafa; color: gray;">
                                                        <h4 class="modal-title col-md-10"><?php echo strtoupper($rec->user); ?></h4>
                                                        <button type="button" class="close col-md-2" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <p>{{$rec->details}}</p>
                                                    </div>
                                                </div>
                                                
                                                </div>
                                            </div>     
                                            
                                        </tr>
                                    @endforeach                               
                                </tbody>
                            </table>
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