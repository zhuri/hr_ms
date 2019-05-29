<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Applicant;
use App\Recruitment;

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
