<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Session;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('admin');
    }
    public function index()
    {
        //
        $user = User::all();
        return view('admin.users.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
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

        $this->validate($request,[
            'name'=>'required|max:255',
            'email'=>'required|unique:users',
        ]);
    

    $user = User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt('password')
    ]);

    $profile = Profile::create([
        'user_id'=>$user->id,
        'avatar'=>'upload/avatar/default.png'
    ]);
    Session::flash('success','Successfully Created User'." ".$user->name);
    return redirect()->back();
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

        $user = User::find($id);
        $user->profile->delete();
        $user->delete();
        Session::flash('success','Successfully Deleted the user'." ".$user->name);
        return redirect()->back();
    }

    public function admin($id){
        $user = User::find($id);
        $user->admin = 1;
        $user->save();
        Session::flash('success','Successfully updated to Admin'." ".$user->name );
        return redirect()->back();
    }

    public function notadmin($id){
        $user = User::find($id);
        $user->admin = 0;
        $user->save();
        Session::flash('success','Successfully Removed to Admin'." ".$user->name );
        return redirect()->back();
    }
}