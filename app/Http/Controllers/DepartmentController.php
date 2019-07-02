<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = DB::table('department')->get();
        return view('departments.index', [
            'departments' => $departments
        ]);
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $department = new Department();
        $department->name = $request->input('name');

        $department->save();
        return redirect('/departments');
    }
}
