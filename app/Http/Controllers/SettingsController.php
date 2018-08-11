<?php

namespace App\Http\Controllers;
use App\Setting;
use Illuminate\Http\Request;
use Session;
class SettingsController extends Controller
{

	public function __construct(){
		$this->middleware('admin');
	}
    //
    public function index(){
    	$setting = Setting::first();
    	return view('admin.settings.setting',compact('setting'));
    }

    public function update(){
    	$this->validate(request(),[
    		'email'=>'required',
    		'address'=>'required',
    		'contact'=>'required',
    		'site_name'=>'required',
            'about'=>'required'
    	]);
    	$setting = Setting::first();
    	
    	$setting->update([
    		'contact_email'=>request()->email,
    		'contact_number'=>request()->contact,
    		'site_name'=>request()->site_name,
    		'address'=>request()->address,
            
    	]);
        $setting->about = request()->about;
        $setting->save();

        

    	Session::flash('success','Successfully Updated the Settings');
    	return redirect()->back();    
    }
}
