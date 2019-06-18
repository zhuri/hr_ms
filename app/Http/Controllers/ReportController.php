<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Facades\DB;
use App\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class ReportController extends Controller
{
    /*public function create($user_id)
    {
        dd($user_id);
    }*/
    public function index()
    {
        $report = DB::table('report')
        ->get();
        
        return view('reports.index', [
            'reports' => $report
        ]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $departments = DB::table('department')->get();
        $users = DB::table('users')->get();

        return view('reports.create', [            
            'departments' => $departments,
            'users' => $users
        ]);
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Report::updateOrCreate([
            "name" => $request->input('name'),
            "description" => $request->input('description'),
            "department_id" => $request->input('department'),
            "user_id" => $request->input('user'),
            
        ]);
        return redirect('/reports');
    }
    public function update(Request $request, $id)
    {
        DB::table('task')->where('id', $id)
        ->update([
            "name" => $request->input('name'),
            "description" => $request->input('description'),
            "department_id" => $request->input('department'),
            "user_id" => $request->input('user')
        ]);

        return redirect()->action('ReportController@index');
    }
}
