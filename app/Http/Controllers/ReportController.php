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
                ->leftJoin('users', 'report.user_id', '=', 'users.id')
                ->select('report.*','users.email as email')
                ->get();
        
                return view('reports.index', ['report' => $report]);
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
        
        $users = DB::table('users')->get();

        return view('reports.create', [            
            
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
            "user_id" => $request->input('user'),
            
        ]);
        return redirect('/reports');
    }
    public function show($id)
    {   
        $report = DB::table('report')
            ->leftJoin('users', 'report.user_id', '=', 'users.id')
            ->select('report.*','users.email as email')
            ->where('report.id', $id)
            ->first();

        $users = DB::table('users')->get();

        if(Auth::user()->role_id != 3) {
            return view('reports.edit', [
                'report' => $report,
                'users' => $users
            ]);
        }
        if(Auth::user()->role_id == 3 and user()->id == $task->user_id){
            return view('reports.edit', [
                'report' => $report,
                'users' => $users
            ]);
        }
        else {
            Session::flash('message', 'You cannot delete, you are an employee!'); 
            Session::flash('alert-class', 'alert-warning');
        }
        
            
    }
    public function update(Request $request, $id)
    {
        DB::table('report')->where('id', $id)
        ->update([
            "name" => $request->input('name'),
            "description" => $request->input('description'),
            "user_id" => $request->input('user')
        ]);

        return redirect()->action('ReportController@index');
    }
    public function destroy($id)
    {
        if (Auth::user()->role_id == Role::$HIGHER_MANAGEMENT or Auth::user()->role_id == Role::$MID_MANAGEMENT) {
            $report = DB::table('report')->where('id', $id);
            $report->delete();
        }
        // if (Auth::user()->role_id == Role::$EMPLOYEE){
        //     Session::flash('message', 'You cannot delete, you are an employee!'); 
        //     Session::flash('alert-class', 'alert-danger');
        // }
        return back();
    }
}
