<?php
namespace App\Controllers;

use App\Models\Post;

class Posts
{

    /** 
     * Show all posts
     * 
     * @return func view
     */
    public static function index()
    {
        $posts = Post::all();

        return view('index', compact('posts'));
    }

    /**
     * Show a single post
     * 
     * @param string $slug
     * @return func view
     */
    public static function show(string $slug)
    {
        $post = Post::where('slug', $slug);

        return view('post', compact('post'));
    }

}
