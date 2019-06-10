<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Role;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
        ->join('department', 'users.department_id', '=', 'department.id')
        ->select('users.*', 'department.name as department')
        ->get();
        
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $users = DB::table('users')
        ->join('department', 'users.department_id', '=', 'department.id')
        ->select('users.*', 'department.name as department')
        ->where('users.id', $id)
        ->first();

        //$users = DB::table('users')->get();
        $departments = DB::table('department')->get();

        return view('users.edit', [
            'users' => $users,
            'departments' => $departments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        DB::table('users')->where('id', $id)
        ->update([
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "department_id" => $request->input('department'),
            // "user_id" => $request->input('user')
        ]);
        return redirect()->action('UserController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
        $user = DB::table('users')->where('id', $id);

        if (Auth::user()->role_id == Role::$HIGHER_MANAGEMENT) {        
            $user->delete();
            return back();
        }
        if (Auth::user()->role_id == Role::$MID_MANAGEMENT and $user->role_id == Role::$EMPLOYEE){
            $user->delete();
            return back();
        }
        if (Auth::user()->role_id == Role::$EMPLOYEE){
            Session::flash('message', 'You cannot delete, you are an employee!'); 
            Session::flash('alert-class', 'alert-danger');
        }
        return back();
    }
}
