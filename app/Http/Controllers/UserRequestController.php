<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\UserRequest;
use App\Role;
use App\UserRequestStatus;

class UserRequestController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id == Role::$HIGHER_MANAGEMENT) {
            $userRequests = DB::table('user_request as ur')
            ->join('users as u', 'ur.user_id', '=', 'u.id')
            ->join('user_request_type as urt', 'urt.id', '=', 'ur.type_id')
            ->join('user_request_status as urs', 'urs.id', '=', 'ur.status_id')
            ->select('ur.*', 'u.name as user', 'urt.name as type', 'urs.name as status')
            ->get();
        }        

        if (Auth::user()->role_id == Role::$MID_MANAGEMENT) {
            $userRequests = DB::table('user_request as ur')
            ->join('users as u', 'ur.user_id', '=', 'u.id')
            ->join('user_request_type as urt', 'urt.id', '=', 'ur.type_id')
            ->join('user_request_status as urs', 'urs.id', '=', 'ur.status_id')
            ->select('ur.*', 'u.name as user', 'urt.name as type', 'u.role_id', 'urs.name as status')
            ->where("u.role_id", '!=', Role::$HIGHER_MANAGEMENT)
            ->get();
        }

        if (Auth::user()->role_id == Role::$EMPLOYEE) {
            $userRequests = DB::table('user_request as ur')
            ->join('users as u', 'ur.user_id', '=', 'u.id')
            ->join('user_request_type as urt', 'urt.id', '=', 'ur.type_id')
            ->join('user_request_status as urs', 'urs.id', '=', 'ur.status_id')
            ->select('ur.*', 'u.name as user', 'urt.name as type', 'u.role_id', 'urs.name as status')
            ->where('ur.user_id', '=', Auth::user()->id)
            ->get();
        }

        return view('user_requests.index', [
            'user_requests' => $userRequests
        ]);
    }

    public function create()
    {
        $requestTypes = DB::table('user_request_type')->get();
        return view('user_requests.create', [
            'request_types' => $requestTypes
        ]);
    }

    public function store(Request $request)
    {
        UserRequest::create([
            'user_id' => Auth::user()->id,
            'type_id' => $request->input('type_id'),
            'details' => $request->input('details'),
            'date_from' => $request->input('date_from'),
            'date_to' => $request->input('date_to'),
            'status_id' => 1
        ]);

        return redirect('/user_requests');
    }

    public function approve($id)
    {
        DB::table('user_request')->where('id', $id)
        ->update([          
            "status_id" => UserRequestStatus::$APPROVED
        ]);
        return redirect('/user_requests');
    }

    public function deny($id)
    {
        DB::table('user_request')->where('id', $id)
        ->update([          
            "status_id" => UserRequestStatus::$DENIED
        ]);
        return redirect('/user_requests');
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
