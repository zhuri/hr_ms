<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Role;
use Illuminate\Support\Facades\DB;

class PayrollController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id == Role::$HIGHER_MANAGEMENT) {
            $payrolls = DB::table('payroll as p')
            ->join('users as u1', 'u1.id', '=', 'p.manager_id')
            ->join('users as u2', 'u2.id', '=', 'p.user_id')
            ->select('p.*', 'u1.name as manager', 'u2.name as user')
            ->get();        
        } else {
            $payrolls = DB::table('payroll as p')
            ->join('users as u1', 'u1.id', '=', 'p.manager_id')
            ->join('users as u2', 'u2.id', '=', 'p.user_id')
            ->select('p.*', 'u1.name as manager', 'u2.name as user')
            ->where('p.user_id', Auth::user()->id)
            ->get();
        }

        return view('payrolls.index', [
            'payrolls' => $payrolls
        ]);
    }

    public function create()
    {
        return view('payrolls.create');
    }

    public function store(Request $request)
    {
        $bonusUsers = $request->input('data');
        $users = DB::table('users')->get();          
        $currUserId = Auth::user()->id;
        foreach($users as $user) {
            $bono = 0;
            if ($bonusUsers != null) {
                foreach($bonusUsers as $bonus) {
                    if ((int)$bonus["user"] == $user->id) {
                        $bono = $bonus['bonus'];
                    }
                }
            }            

            DB::table('payroll')->insert([
                'manager_id' => $currUserId,
                'user_id' => $user->id,
                'sum' => $user->salary,
                'bonus' => $bono
            ]);
        }
        
        return redirect('/payrolls');
    }

    public function show(int $id)
    {
        
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(int $id)
    {
        //
    }
}
