<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Department;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = DB::table('department')
        ->get();
        
        return view('departments.index', [
            'department' => $department
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
        $department = DB::table('department')->get();
        
        return view('departments.create');
    }

    public function store(Request $request)
    {
        Department::updateOrCreate([
            "name" => $request->input('name')
        ]);
        
        return redirect('/departments');
    }

    public function show(int $id)
    {
        $department = DB::table('department as d')   
            ->select('d.*')
            ->where('d.id', $id)
            ->first();
        
       

        return view('departments.edit', [
            'department' => $department
        ]);
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, $id)
    {
        DB::table('department')->where('id', $id)
        ->update([
            "name" => $request->input('name'),        
        ]);

        return redirect('/departments');
    }

    public function destroy(int $id)
    {
        $department = DB::table('department')->where('id', $id);
        if (Auth::user()->role_id != 3) {        
            $department->delete();
            return back();
        }
        return back();
    }
}
