@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div><a href="{{ url('/users') }}" class="btn btn-default btn-block">Users</a></div>    
                    <br>      
                    <div><a href="{{ url('/tasks') }}" class="btn btn-default btn-block">Tasks</a></div>
                    <br>
                    <div><a href="{{ url('/recruitments') }}" class="btn btn-default btn-block">Recruitment</a></div>
                    <br>
                    <div><a href="{{ url('/vacations') }}" class="btn btn-default btn-block">Vacations</a></div>
                    <br>
                    <div><a href="{{ url('/payrolls') }}" class="btn btn-default btn-block">Payrolls</a></div>
                    <br>
                    <div><a href="{{ url('/departments') }}" class="btn btn-default btn-block">Departments</a></div>
                </div>            
            </div>
        </div>
    </div>
</div>
@endsection
