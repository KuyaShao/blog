<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $user = Auth::user();
        return view('admin.profile.index',compact('user'));
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
    public function update(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'password'=>'min:8',
        ]);

        $user = Auth::user();

        if($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avatar_new = time().$avatar->getClientOriginalName();
            $avatar->move('upload/avatar'.$avatar_new);
            $avatar_new = "upload/avatar".$avatar_new;
        }else{
            $avatar_new = $user->profile->avatar;
        }

        $user->profile->avatar = $avatar_new;
        $user->profile->about = $request->about;
        $user->profile->facebook=$request->facebook;
        $user->profile->youtube=$request->youtube;
        $user->name=$request->name;
        $user->email=$request->email;

        if($request->has('password')){
            $user->password = bcrypt($request->password);
        }else{
            $user->password =$user->password;
        }

        $user->save();
        $user->profile->save();

        Session::flash('success',"Successfully Updated your Profile");
        return redirect()->back();
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
