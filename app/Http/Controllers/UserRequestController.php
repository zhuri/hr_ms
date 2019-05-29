<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\UserRequest;

class UserRequestController extends Controller
{
    public function index()
    {
        $userRequests = DB::table('user_request as ur')
            ->join('users as u', 'ur.user_id', '=', 'u.id')
            ->join('user_request_type as urt', 'urt.id', '=', 'ur.type_id')
            ->select('ur.*', 'u.name as user', 'urt.name as type')
            ->get();

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
            'date_to' => $request->input('date_to')
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
