<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;

use App\Tag;
class FrontendController extends Controller
{
    //

    public function index(){
        $setting = Setting::first();
        $category = Category::take(4)->get();
        $firstpost = Post::orderBy('created_at','desc')->first();
        $second_post = Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first();
        $third_post = Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first();
        $laravel = Category::find(2);
        $js = Category::find(1);
        return view('index',compact('setting','category','firstpost','second_post','third_post','laravel','js'));
    }

    public function singlepost($slug){



        $search = Post::where('slug',$slug)->first();
        $post = Post::all()->first();
        $next_id = Post::where('id','>',$search->id)->min('id');
        $prev_id = Post::where('id','<',$search->id)->max('id');

        $next = Post::find($next_id);
        $prev = Post::find($prev_id);

        $category = Category::take(4)->get();
        $setting = Setting::first();

        $tags = Tag::all();

        return view('single',compact('search','category','setting','next','prev','tags','post'));
    }

    public function category($id){
        $categories = Category::find($id);
        //$title = $category->name;
        $category = Category::take(4)->get();
        $setting = Setting::first();

        return view('category',compact('category','categories','setting'));
    }



    public function tag($id){
        $tag = Tag::find($id);
        //$title = $category->name;
        $category = Category::take(4)->get();
        $setting = Setting::first();

        return view('tag',compact('category','tag','setting'));
    }
}
