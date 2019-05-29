@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-md-2">
                                <a class="btn btn-default btn-block" href="{{ action('RecruitmentController@create') }}">Add new</a>
                            </div>                        
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>                                
                                <th class="col-md-2">Status</th>
                                <th class="col-md-2">Applicant</th>
                                <th class="col-md-2">Position</th>
                                <th class="col-md-2">Date started</th>                                
                                <th>Operations</th>
                            </thead>
                            <tbody>
                                @foreach ($recruitments as $rec)
                                    <tr>                                    
                                        <td>{{$rec->status}}</td>
                                        <td>{{$rec->first_name . " " . $rec->last_name}}</td>
                                        <td>{{$rec->position}}</td>   
                                        <td>{{$rec->created_at}}</td>     
                                        <td>
                                            <a href="{{ action('RecruitmentController@show', $rec->id) }}" class="btn btn-info btn-fill">Edit</a>
                                            <a href="{{ action('RecruitmentController@destroy', $rec->id) }}" class="btn btn-danger btn-fill">Delete</a>
                                        </td>                               
                                    </tr>
                                @endforeach                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>                        
        </div>
    </div>
</div>
    
@endsection