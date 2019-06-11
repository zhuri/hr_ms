<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserMetadataController extends Controller
{
    //
    // public function index()
    // {
    //     $users = DB::table('user_metadata');
    //     return view('users.index', ['user_metadata' => $user_metadata]);
    // }

    public function update(Request $request, $id)
    {
        //
        $user_metadata = DB::table('user_metadata');

        DB::table('user_metadata')->where('id', $id)
        ->update([
            "street" => $request->input('street'),
            "city" => $request->input('city'),
            "country" => $request->input('country'),
            // "user_id" => $request->input('user')
        ]);

        return back()->withInput();
    }
}
