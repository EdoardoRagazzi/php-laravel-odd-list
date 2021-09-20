<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Tag;
use App\Category;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Just 4 Posts trough link() method on index.blade.php
        $posts = Post::paginate(4);
        // All page 
        // $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        $categories = Category::all();
        $tags= Tag::all();
        return view('admin.posts.create', compact('post','categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // Validation Data
    $request->validate([
        'title'=> 'required|max:255',
        'content'=> 'required'
    ]);

        // Get the data
        $data = $request->all();
        // create a new instance
        $newPost = new Post();

        $slug= Str::slug($data['title'], '-');
        $slugbase = $slug;
        $slugpresent = Post::where('slug', $slug)->first();
        $counter=1;
           while($slugpresent){
               $slug = $slugbase . '-' . $counter;
               $slugpresent = Post::where('slug',$slug)->first();
               $counter++;
           }
        // Create slug of title because there isn't on page Admin.Posts.Create 
        $newPost->slug = $slug;
        // Fill the data on newPost instance
        $newPost->fill($data);
        // Must save the data
        $newPost->save();
        if(array_key_exists('tags',$data)){
            $newPost->tags()->attach($data['tags']);    
        }
      

        return redirect()->route('admin.posts.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
       $categories = Category::all();
       $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
        $request->validate([
            'title'=> 'required|max:255',
            'content'=> 'required',
            'category_id' => 'nullable|exists:categories,id'

        ]);
       $data = $request->all();

       if($data['title'] != $post->title){

           $slug = Str::slug($data['title'], '-');
        //    Remember variables di appoggio

           $slugbase = $slug;
// rivedere i concetti di slugpresent valore booleano
           $slugpresent = Post::where('slug', $slug)->first();
           
           $counter=1;
           while($slugpresent){
               $slug = $slugbase . '-' . $counter;
               $slugpresent = Post::where('slug',$slug)->first();
               $counter++;
           }
           $data['slug'] = $slug;
       }

       $post->update($data);

       if(array_key_exists('tags',$data)){
           $post->tags()->sync($data['tags']);
       }

       return redirect()->route('admin.posts.index')->with('updated', 'Update Element:'.' '. $post->id); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        $post->tags()->detach();
        return redirect()->route('admin.posts.index')->with('delete', 'Delete Element'. ' '  . $post->id);
    }
}
