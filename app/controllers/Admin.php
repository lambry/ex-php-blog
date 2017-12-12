<?php
namespace App\Controllers;

use App\Models\Post;

class Admin
{

    /** 
     * Show the post form
     * 
     * @param string $id
     * @return func view
     */
    public function form($id = false)
    {
        $post = $id ? Post::where('id', (int) $id) : null;

        return view('edit', compact('post'));
    }

    /** 
     * Add a new post
     * 
     * @return func redirect
     */
    public function add()
    {
        Post::add([
            'title' => $_POST['title'],
            'slug' => slugify($_POST['title']),
            'content' => $_POST['content']
        ]);

        return redirect('/');
    }

    /** 
     * Update an exisiting post
     * 
     * @return func redirect
     */
    public function edit()
    {
        Post::update([
            'id' => $_POST['id'],
            'title' => $_POST['title'],
            'slug' => slugify($_POST['title']),
            'content' => $_POST['content']
        ]);

        return redirect('/');
    }

    /** 
     * Remove an exisiting post
     * 
     * @param string $id
     * @return func redirect
     */
    public function delete(string $id)
    {
        Post::delete($id);

        return redirect('/');
    }

}
