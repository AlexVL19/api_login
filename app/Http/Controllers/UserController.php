<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userobj = User::all();
        return $userobj;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userobj = new User();

        $userobj->name = $request->name;
        $userobj->email = $request->email;
        $userobj->password = $request->password;

        $userobj->save();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $userobj = User::findOrFail($request->id);

        $userobj->name = $request->name;
        $userobj->email = $request->email;
        $userobj->password = $request->password;

        $userobj->save();

        return $userobj;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $userobj = User::destroy($request->id);
        return $userobj;
    }
}
