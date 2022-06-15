<?php

namespace App\Services;

use App\Models\Blog;

class BlogService
{
    public function getData()
    {
        return Blog::with('createdAuthor', 'createdUser')->get();
    }

    public function show($id)
    {
        $blogs = Blog::find($id);
        return Blog::with('createdAuthor', 'createdUser')->get();
    }	
    
    public function find($blog_id)
    {
        return Blog::with('createdAuthor', 'createdUser')->find($blog_id);
    }

    public function create($data = [])
    {
        return Blog::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'created_user_id' => $data['created_user_id'],
            'created_author_id' => $data['created_author_id'],
            'image' => $data['image']->hashName(),
        ]);
    }

    public function update($data = [])
    {
        return Blog::update([
            'title' => $data['title'],
            'description' => $data['description'],
            'created_user_id' => $data['created_user_id'],
            'created_author_id' => $data['created_author_id'],
            'image' => $data['image']->hashName()
        ]);
    }

    public function delete($id)
    {
        $blogs = Blog::find($id);
        $blogs->delete();
    }	

}
