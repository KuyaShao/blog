<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use Session;
use App\Tag;
use App\Category;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post = Post::all();
        return view('admin.posts.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category=Category::all();
        $tag = Tag::all();
        if($category->count()==0){
            Session::flash('info','You must have some categories before attempting to create a post');
            return redirect()->back();
        }
        return view('admin.posts.create',compact('category','tag'));
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
        'title' => 'required|max:255',
        'featured'=>'required|image',
        'content'=>'required',
        'categ_id'=>'required',
        'tags' =>'required',
        'user_id'=>Auth::id()
        ]);

        $featured = $request->featured;
        $featured_name = time().$featured->getClientOriginalName();
        $featured->move('upload/posts/',$featured_name);
       
        $post=Post::create([
            'category_id'=>$request->categ_id,
            'title'=>$request->title,
            'content'=>$request->content,
            'featured'=>'upload/posts/'.$featured_name,
            'slug'=>str_slug($request->title),
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success','You successfully created Posts');
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
        $category=Category::all();
        $post = Post::find($id);
        $tag = Tag::all();
        return view('admin.posts.edit',compact('post','category','tag'));
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

           $this->validate($request,[
        'title' => 'required|max:255',
      
        'content'=>'required',
        'categ_id'=>'required',
        'tags'=>'required'
        ]);

       $post =Post::find($id);

      if($request->hasFile('featured')){
        $featured = $request->featured;
        $featured_name = time().$featured->getClientOriginalName();
        $featured->move('upload/posts/',$featured_name);
        $featured_name = 'upload/posts/'.$featured_name;
       }else{
        $featured_name = $post->featured;
        //return $featured_name;
       }
        $post->update([
            'category_id'=>$request->categ_id,
            'title'=>$request->title,
            'content'=>$request->content,
            'featured'=>$featured_name,
            'slug'=>str_slug($request->title),
        ]);
        $post->tags()->sync($request->tags);

        Session::flash('success','You successfully updated the posts about'." ".$post->title);
       return redirect()->route('admin.post');

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

        $post = Post::find($id);
        $post->delete();
        Session::flash("success","Successfully Trashed the Post");
        return redirect()->back();
    }

    public function trashed()
    {
        $post = Post::onlyTrashed()->get();
        return view('admin.posts.trashed',compact('post'));
    }

    public function kill($id){
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        Session::flash('success',"Succesfully Deleted the post about"." ".$post->title);
        return redirect()->back();

    }

    public function restored($id){
        $post = Post::withTrashed()->find($id);
        $post->restore();
        Session::flash('success',"Succesfully Restored the post about"." ".$post->title);
        return redirect()->back();
    }
}
