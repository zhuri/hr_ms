@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="header">
                        <div class="row">
                            <div class="col-md-2">
                                <a class="btn btn-default btn-block" href="{{ action('PayrollController@create') }}">Generate for this month</a>
                            </div>                        
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
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