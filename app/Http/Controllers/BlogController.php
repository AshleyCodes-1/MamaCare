<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::where('blogs.user_id', Auth::user()->id)->get()->sortDesc();
     
        return view('admin.blog.index', ['blogs'=>$blog]);
    }

    public function adminIndex()
    {
        $blog = Blog::get()->sortDesc();
        return view('super-admin.blog.index', ['blogs'=>$blog]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
        ]);
        
        $data = new Blog();
        $data->title = $request->title;
        $data->user_id = Auth::user()->id;
        $data->description = $request->description;
        $data->designation = $request->designation;
        if($request->hasfile('image')){
            $data->image = $request->file('image')->store('public/images/blog');
        }
        $data->save();


        return redirect(route('blog.blogs'))->with('success', 'Updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $Testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $Testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $Testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.edit', ['blog'=>$blog]);
    }

    public function adminEdit($id)
    {
        $blog = Blog::find($id);
        return view('super-admin.blog.edit', ['blog'=>$blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $Testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
        ]);
        
        $data = Blog::find($request->id);
        $data->title = $request->title;
        $data->user_id = Auth::user()->id;
        $data->description = $request->description;
        $data->designation = $request->designation;
        if($request->hasfile('image')){
            $data->image = $request->file('image')->store('public/images/blog');

        }
        $data->save();
        return redirect(route('blog.blogs'))->with('success', 'Updated');
    }

    public function adminUpdate(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
        ]);
        
        $data = Blog::find($request->id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->designation = $request->designation;
        if($request->hasfile('image')){
            $data->image = $request->file('image')->store('public/images/blog');

        }
        $data->save();
        return redirect(route('admin.blog.blogs'))->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $Testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Blog::find($id);
        $res = @unlink('storage/app/'.$data->image);
        $data->delete();
            
        return redirect(route('blog.blogs'))->with('success', 'Deleted');
    }

    public function adminDestroy($id)
    {
        $data = Blog::find($id);
        $res = @unlink('storage/app/'.$data->image);
        $data->delete();
            
        return redirect(route('admin.blog.blogs'))->with('success', 'Deleted');
    }
}