<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all()->count();
        $trashed = Post::onlyTrashed()->get()->count();
        $user = User::all()->count();
        $categ = Category::all()->count();
        return view('admin.home',compact('post','user','categ','trashed'));
    }
}
