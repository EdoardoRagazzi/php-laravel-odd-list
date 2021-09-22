<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    
    public function index(){
// Call Json from the database
        // $posts = Post::all();
         $posts= Post::paginate(4);
        return response()->json([
            'success' => true,
            'results' => $posts
        ]);
    }
    public function show($slug){
        $post = Post::where('slug', $slug)->first();
        if($post){
            return response()->json([
                'success'=> true,
                'results'=> $post
            ]);
        }
        return response()->json([
            'success'=> false,
            'results'=> 'Non ce ne sono'
        ]);
        
    }
}
