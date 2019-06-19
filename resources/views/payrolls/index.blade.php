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
                            <input class="col-md-5" style="margin-left:15px;margin-bottom:18px;padding:5px 10px;" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for usernames.." title="Type in a name">
                            </div>
                            <div class="col-md-2">
                            @if(Auth::user()->role_id != 3)
                                <a style="margin-bottom:10px;" class="btn btn-outline-success col-md-12" href="{{ action('PayrollController@create') }}">Generate for this month</a>
                            @endif
                            </div>                        
                        </div>                 
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped" id="myTable">
                                <thead>                                
                                    <th>Manager</th>
                                    <th>User</th>
                                    <th>Sum</th>
                                    <th>Bonus</th>                                
                                    <th>Created</th>
                                </thead>
                                <tbody>
                                    @foreach ($payrolls as $pay)
                                        <tr>                                    
                                            <td>{{$pay->manager}}</td>
                                            <td>{{$pay->user}}</td>
                                            <td>{{$pay->sum + $pay->bonus}}</td> 
                                            <td>{{$pay->bonus}}</td>  
                                            <td>{{$pay->created_at}}</td>                                                                    
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