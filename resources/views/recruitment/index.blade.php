@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="header">
                        <div class="row">
                            <div class="col-md-7"></div>
                            <div class="col-md-2">
                                <a style="margin-bottom:10px;" class="btn btn-outline-secondary col-md-12" href="{{ action('RecruitmentController@create') }}">Add new</a>
                            </div>                        
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>                                
                                    <th >Status</th>
                                    <th >Applicant</th>
                                    <th >Position</th>
                                    <th >Date started</th>                                
                                    <th>Operations</th>
                                </thead>
                                <tbody>
                                    @foreach ($recruitments as $rec)
                                        <tr>                                    
                                            <td>{{$rec->status}}</td>
                                            <td>{{$rec->first_name . " " . $rec->last_name}}</td>
                                            <td>{{$rec->position}}</td>   
                                            <td>{{$rec->created_at}}</td>     
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