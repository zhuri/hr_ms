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
                            <input class="col-md-5" style="padding:5px 20px;margin-bottom:18px;margin-left:15px;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for applicant.." title="Type in a name">
                            </div>
                            <div class="col-md-2">
                                <a style="" class="btn btn-outline-secondary col-md-12" href="{{ action('RecruitmentController@create') }}">Add new</a>
                            </div>                        
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="content table-responsive table-full-width">
                        
                            <table class="table table-hover table-striped" id="myTable">
                                <thead>                                 
                                    <th >Status</th>
                                    <th >Applicant</th>
                                    <th >Position</th>
                                    <th >Date started</th>
                                    <th>E-mail</th>                                
                                    <th>Operations</th>
                                </thead>
                                <tbody>
                                    @foreach ($recruitments as $rec)
                                    <?php $recId = $rec->id; ?>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal<?php echo $recId ?>" role="dialog">
                                            <div class="modal-dialog">
                                            
                                            <!-- Modal content-->
                                            <div class="modal-content col-md-10" style="vertical-align:center;padding-left:0px;padding-right:0px;border-radius:4px;margin-top:15%;">
                                                <div class="modal-header" style="background-color: #fbfafa; color: gray;">
                                                    <h4 class="modal-title col-md-10"><?php echo strtoupper($rec->first_name . " " . $rec->last_name); ?></h4>
                                                    <button type="button" class="close col-md-2" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <p>{{$rec->notes}}</p>
                                                </div>
                                            </div>
                                            
                                            </div>
                                        </div>         
                                        <tr >                                   
                                            <td>{{$rec->status}}</td>
                                            <td data-toggle="modal" data-target="#myModal<?php echo $recId ?>">{{$rec->first_name . " " . $rec->last_name}}</td>
                                            <td>{{$rec->position}}</td>   
                                            <td>{{$rec->created_at}}</td>  
                                            <td><a href="{{ action('RecruitmentController@sendMail', ['email' => $rec->email]) }}"><i class="fa fa-envelope" style="font-size:24px"></i></a></td>   
                                            <td style="width:150px;">
                                                <a href="{{ action('RecruitmentController@show', $rec->id) }}" class="btn btn-fill" style="background-color:#66b3ff; color:white;">Edit</a>
                                                <a href="{{ action('RecruitmentController@destroy', $rec->id) }}" class="btn btn-fill" style="background-color:#d11a2a; color:white;">Delete</a>
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