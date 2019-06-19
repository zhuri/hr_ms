<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use App\Position;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        $position = DB::table('positions')
                
                ->join('department', 'positions.department_id', '=', 'department.id')
                ->select('positions.*', 'department.name as department')
                ->get();
        
        return view('positions.index', [
            'positions' => $position
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $departments = DB::table('department')->get();
        

        return view('positions.create', [            
            'departments' => $departments
            
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
        Position::updateOrCreate([
            "name" => $request->input('name'),
            "department_id" => $request->input('department'),
        ]);
        
        return redirect('/positions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $position = DB::table('positions')
        ->join('department', 'positions.department_id', '=', 'department.id')
        ->select('positions.*', 'department.name as department')
        ->where('positions.id', $id)
        ->first();

    $departments = DB::table('department')->get();
    

    if(Auth::user()->role_id != 3) {
        return view('positions.edit', [
            'positions' => $position,
            'departments' => $departments,  
        ]);
    }
    if(Auth::user()->role_id == 3 and user()->id == $task->user_id){
        return view('positions.edit', [
            'positions' => $position,
            'departments' => $departments,
        ]);
    }
    else {
        Session::flash('message', 'You cannot delete, you are an employee!'); 
        Session::flash('alert-class', 'alert-warning');
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {                
        DB::table('positions')->where('id', $id)
        ->update([
            "name" => $request->input('name'),
            "department_id" => $request->input('department'),
            
        ]);

        return redirect()->action('PositionController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->role_id == Role::$HIGHER_MANAGEMENT or Auth::user()->role_id == Role::$MID_MANAGEMENT) {
            $position = DB::table('positions')->where('id', $id);
            $position->delete();
        }
        // if (Auth::user()->role_id == Role::$EMPLOYEE){
        //     Session::flash('message', 'You cannot delete, you are an employee!'); 
        //     Session::flash('alert-class', 'alert-danger');
        // }
        return back();
    }
}
