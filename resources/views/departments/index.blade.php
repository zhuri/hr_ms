@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="header">
                        <div class="row">
                        <div class="col-md-5" style="margin-bottom:13px;">
                            <input class="col-md-6" style="margin-left:15px;margin-bottom:20px;padding:5px 10px;" type="text" id="myInput" onkeyup="myFunction2()" placeholder="Search for department.." title="Type in a name">
                            </div>
                            <div class="col-md-2">
                            <a style="" class="btn btn-outline-secondary col-md-12" href="{{ action('DepartmentController@create') }}">Add new</a>
                            </div>                        
                        </div>
                    </div>
                    </div>
                    <div class="col-md-8">
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>                                
                                    <th class="col-md-2">Department</th>                                    
                                </thead>
                                <tbody>
                                    @foreach ($departments as $dpt)
                                        <tr>                                    
                                            <td>{{$dpt->name}}</td>                                                       
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