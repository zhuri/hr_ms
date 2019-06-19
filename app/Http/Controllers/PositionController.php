<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Applicant;
use App\Recruitment;
use App\RecruitmentStatus;
use App\User;
use App\Role;
use App\Position;
use Illuminate\Support\Facades\Hash;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        $position = DB::table('positions as p')
        ->join('department as d', 'd.id', '=', 'p.department_id')
        ->select('p.*', 'd.name as department')
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
        $position = DB::table('positions')->get();
        return view('positions.create'
            
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $positions = new Position();
        $positions->name = $request->input('name');
        $positions->department_id = $request->input('department_id');
        $positions->save();
        
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
        $position = DB::table('positions as p')
            ->join('department as d', 'p.department_id', '=', 'd.id')      
            ->select('p.*', 'd.id as department_id')
            ->where('p.id', $id)
            ->first();
        
        $department = DB::table('department')->get();
        

        return view('positions.edit', [
            'positions' => $position,
            'department' => $department
        ]);
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $position = DB::table('positions')->where('id', $id);
        if (Auth::user()->role_id != 3) {        
            $position->delete();
            return back();
        }
        if (Auth::user()->role_id == Role::$EMPLOYEE){
            Session::flash('message', 'You cannot delete, you are an employee!'); 
            Session::flash('alert-class', 'alert-danger');
        }
        return back();
    }
}
