<?php
namespace App\Models;

use App;

class Post
{

    /** 
     * Retrieve all posts from database
     * 
     * @return array $posts 
     */
    public static function all()
    {
        return App::use('database')->select('posts')->all();
    }

    /**
     * Retrieve a single by where
     * 
     * @param string $field
     * @param string $value
     * @return array $post
     */
    public static function where($field, $value)
    {
        return App::use('database')->select('posts')->where($field, $value);
    }

}
