<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all Blog Posts
       $posts = BlogPost ::all(); //fetch all blog posts from DB
       return view('blog.index',[
           'posts'=>$posts,
       ]); //returns the view with posts

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //show form to create a blog post
        return view('blog.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store a new post
        $newPost= BlogPost::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'user_id'=>1
        ]);
        return redirect('blog/'.$newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
        //show a blog post
        return view('blog.show',[
            'post'=>$blogPost,
        ]); //returns the view with the post
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        // eshow form to edit the Post
        return view('blog.edit',[
            'post'=>$blogPost,

        ]); //returns the edit view with the post
        return redirect('blog/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        //save the edited post
        $blogPost->update([
            'title'=>$request->title,
            'body' =>$request->body
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        //delete a post
        $blogPost->delete();
        return redirect('/blog');
    }
}
