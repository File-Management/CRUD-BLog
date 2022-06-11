<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BlogService;
use App\Models\Blog;
use Storage;

class BlogController extends Controller
{
    protected $BlogService;
    function __construct(
        BlogService $BlogService
    ) {
        $this->BlogService = $BlogService;
    }

    public function index()
    {
        $blogs = $this->BlogService->getData();
        return view('blog.index', [
            'data_blogs' => $blogs
        ]);
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'     => 'required',
            'description'   => 'required',
            'created_user_id' => 'required',
            'created_author_id' => 'required',
            'image'     => 'required|image|mimes:png,jpg,jpeg'
            
            
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('/blogs', $image->hashName());

        $blog = Blog::create([
            'title'     => $request->title,
            'description'   => $request->description,
            'created_user_id'   => $request->created_user_id,
            'created_author_id'   => $request->created_author_id,
            'image'     => $image->hashName()
            
        ]);

        return redirect()->route('blog.index')->with('succes', 'Data Berhasil Disimpan');
    }

    public function show(Blog $blog)
    {
        return view('blog.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $this->validate($request, [
            'title'     => 'required',
            'description'   => 'required',
            'created_author_id'   => 'required',
            'created_user_id' => 'required'
        ]);

        //get data Blog by ID
        $blog = Blog::findOrFail($blog->id);

        if ($request->file('image') == "") {

            $blog->update([
                'title'     => $request->title,
                'description'   => $request->description,
                'created_author_id'     => $request->created_author_id,
                'created_user_id'     => $request->created_user_id
                
            ]);
        } else {

            //hapus old image
            Storage::disk('public')->delete('public/blogs/' . $blog->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('/blogs', $image->hashName());

            $blog->update([
                'title'     => $request->title,
                'description'   => $request->description,
                'created_user_id' => $request->created_user_id,
                'created_author_id' => $request->created_author_id,
                'image'     => $image->hashName()
            ]);

            return redirect()->route('blog.index')->with('succes', 'Data Berhasil Diupdate');
        }
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blog.index')->with('succes', 'Data Berhasil Dihapus');
    }
}
