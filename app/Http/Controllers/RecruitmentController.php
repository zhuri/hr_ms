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
use Illuminate\Support\Facades\Hash;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        $recruitments = DB::table('recruitment as r')
        ->join('recruitment_status as rs', 'rs.id', '=', 'r.status_id')
        ->join('applicant as a', 'a.id', '=', 'r.applicant_id')
        ->join('positions as p', 'p.id', '=', 'a.position_id')
        ->select('r.*', 'rs.name as status', 'a.first_name', 'a.last_name', 'p.name as position')
        ->orderBy('updated_at', 'desc')
        ->get();
        
        return view('recruitment.index', [
            'recruitments' => $recruitments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $statuses = DB::table('recruitment_status')->get();
        $positions = DB::table('positions')->get();
        return view('recruitment.create', [
            'statuses' => $statuses,
            'positions' => $positions
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

        $applicant = new Applicant();
        $applicant->first_name = $request->input('first_name');
        $applicant->last_name = $request->input('last_name');
        $applicant->position_id = $request->input('position_id');
        $applicant->save();

        $recruitment = new Recruitment();
        $recruitment->status_id = $request->input('status_id');
        $recruitment->applicant_id = $applicant->id;
        $recruitment->notes = $request->input('notes');
        $recruitment->save();
        
        return redirect('/recruitments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $recruitment = DB::table('recruitment as r')
            ->join('applicant as a', 'r.applicant_id', '=', 'a.id')   
            ->join('positions as p', 'p.id', '=', 'a.position_id')     
            ->select('r.*', 'a.first_name', 'a.last_name', 'p.id as position_id')
            ->where('r.id', $id)
            ->first();
        
        $positions = DB::table('positions')->get();
        $statuses = DB::table('recruitment_status')->get();

        return view('recruitment.edit', [
            'recruitment' => $recruitment,
            'positions' => $positions,
            'statuses' => $statuses
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
        if (RecruitmentStatus::isStatusFinished($request->input('status_id'))) {
            $position = DB::table('positions')->find($request->input('position_id'));            
            User::updateOrCreate(
                ['name' => $request->input('name'), 'email' => $request->input('name'). '@company.com',],
                [
                    'name' => $request->input('name'),
                    'email' => $request->input('name'). '@company.com',
                    'password' => Hash::make("test123"),
                    'role_id' => 3,
                    'department_id' => $position->department_id,
            ]);
            // and then we send the email and password to his inbox email for reset
        }

        DB::table('recruitment')->where('id', $id)
        ->update([
            "status_id" => $request->input('status_id'),
            "notes" => $request->input('notes'),            
        ]);

        return redirect('/recruitments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recruitment = DB::table('recruitment')->where('id', $id);
        if (Auth::user()->role_id != 3) {        
            $recruitment->delete();
            return back();
        }
        if (Auth::user()->role_id == Role::$EMPLOYEE){
            Session::flash('message', 'You cannot delete, you are an employee!'); 
            Session::flash('alert-class', 'alert-danger');
        }
        return back();
    }
}
