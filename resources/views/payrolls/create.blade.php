@extends('layouts.app')
@section('content')
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                        <h4 class="title">Generate payrolls for {{date('F Y')}}</h4>
                        </div>
                        <div class="content">
                        <form action="{{action('PayrollController@store')}}" method="POST">
                            {{ csrf_field() }}
                            @method('POST')
                                <div class="row">
                                    
                                    <div class="container">
                                            <table id="myTable" class=" table order-list">
                                            <thead>
                                                <tr></tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="col-sm-4"></td>
                                                    <td class="col-sm-4"></td>
                                                    <td class="col-sm-3"></td>
                                                    <td class="col-sm-2"><a class="deleteRow"></a></td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="5" style="text-align: left;">
                                                        <input type="button" class="btn btn-lg btn-block " id="addrow" value="Add Bonus user" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                                 
                                <input type="submit" class="btn btn-info btn-fill pull-right" value="Generate"/>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
@endsection
