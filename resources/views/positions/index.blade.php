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
                                    <th >Number of applicants</th>                                 
                                </thead>
                                <tbody>
                                    @foreach ($positions as $pos)
                                        <tr>                                    
                                            <td>{{$pos->name}}</td>           
                                            <td>{{$pos->number_of_applicants}}</td>                                                          
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