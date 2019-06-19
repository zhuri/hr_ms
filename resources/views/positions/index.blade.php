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
                            <input class="col-md-5" style="padding:5px 20px;margin-bottom:18px;margin-left:15px;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                            </div>
                            <div class="col-md-2">
                                <a style="" class="btn btn-outline-secondary col-md-12" href="{{ action('PositionController@create') }}">Add new</a>
                            </div>                        
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="content table-responsive table-full-width">
                        
                            <table class="table table-hover table-striped" id="myTable">
                                <thead>                                
                                    <th >Position</th>
                                    <th >Department</th>                                
                                    <th>Operations</th>
                                </thead>
                                <tbody>
                                    @foreach ($positions as $pos)
                                        <tr>                                    
                                            <td>{{$pos->name}}</td>   
                                            <td>{{$pos->department}}</td>     
                                            <td style="width:150px;">
                                                <a href="{{ action('PositionController@show', $pos->id) }}" class="btn btn-fill" style="background-color:#66b3ff; color:white;">Edit</a>
                                                <a href="{{ action('PositionController@destroy', $pos->id) }}" class="btn btn-fill" style="background-color:#d11a2a; color:white;">Delete</a>
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