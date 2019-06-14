@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11" style="height: 200px;
                                          width: 800px;
                                          display: flex;
                                          flex-direction: column;
                                          justify-content: center;
                                          content-align: center;
                                          text-align: center;">
                @if(Carbon\Carbon::now()->hour >= 2 and Carbon\Carbon::now()->hour < 10)
                    <img src="http://127.0.0.1:8000/assets/img/morning.png" style="margin: auto; width: 120px">
                    <h1 style="font-weight: 350; font-size: 55px; font-weight;">GOOD MORNING</h1>
                @endif    
                @if(Carbon\Carbon::now()->hour >= 10 and Carbon\Carbon::now()->hour < 18)
                    <img src="http://127.0.0.1:8000/assets/img/day.png" style="margin: auto; width: 120px">                
                    <h1 style="font-weight: 350; font-size: 55px; font-weight;">GOOD AFTERNOON</h1>
                @endif
                @if((Carbon\Carbon::now()->hour >= 18 and Carbon\Carbon::now()->hour <= 23) or (Carbon\Carbon::now()->hour == 00 or Carbon\Carbon::now()->hour == 1))
                    <img src="http://127.0.0.1:8000/assets/img/night.png" style="margin: auto; width: 120px">                                    
                    <h1 style="font-weight: 350; font-size: 55px; font-weight;">GOOD EVENING</h1>
                @endif
                <h1 style="font-weight: 200; letter-spacing: 1px;">{{Auth::user()->name}}</h1>
            </div>
            <div class="col-md-11" style="height: 200px;
                                          width: 800px;
                                          display: flex;
                                          flex-direction: column;
                                          justify-content: center;
                                          content-align: center;
                                          text-align: center;
                                          margin-top: 20px;">
            <h3 style="font-weight: 200;">Today's date is:<h3>
            <h3 style="font-weight: 200;">{{Carbon\Carbon::now()->toDayDateTimeString()}}
            </div>
            <div class="col-md-11" style="height: 100px;
                                          width: 800px;
                                          display: flex;
                                          flex-direction: column;
                                          justify-content: center;
                                          content-align: center;
                                          text-align: center;">
            <p style="font-size: 15px;">You can check if you have any task to finish (<a href="/tasks">Tasks</a>), or take a look at the latest payroll (<a href="/payrolls">Payroll</a>).</p>
            </div>
        </div>
    </div> 
</div>

@endsection
