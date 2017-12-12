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

    /**
     * Add a new post
     * 
     * @param array $data
     * @return array $post
     */
    public static function add(array $data)
    {
        return App::use('database')->select('posts')->insert($data);
    }

    /**
     * Update an existing post
     * 
     * @param array $data
     * @return array $post
     */
    public static function update(array $data)
    {
        return App::use('database')->select('posts')->update($data);
    }

    /**
     * Remove an existing post
     * 
     * @param int $id
     * @return array $post
     */
    public static function delete(int $id)
    {
        return App::use('database')->select('posts')->delete($id);
    }

}
