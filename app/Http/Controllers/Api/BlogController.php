<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\BlogService;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use Storage;

class BlogController extends Controller
{
    protected $BlogServices;
    public function __construct(
        BlogService $BlogService
    ) {
        $this->BlogService = $BlogService;
    }

    public function getData()
    {
        $blogs = $this->BlogService->getData();
        return $this->responSuccess(200, 'Success', $blogs);
    }

    public function show($id)
    {
        $blogs = $this->BlogService->show($id);
        return $this->responSuccess(200, 'Success', $blogs);
    }

    public function create(Request $request)
    {
        $user = User::where('api_token')->first();

        
        $request['created_user_id'] = $user->id;
        $request['created_author_id'] = $user->id;

        $image = $request->file('image');
        $image->storeAs('/blogs', $image->hashName());

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ], [
            'title.required' => 'title diperlukan !',
            'description.required' => 'description diperlukan !',
            'image.required' => 'image diperlukan !'
        ]);
        $blog = $this->BlogService->create($request->all());
        return $this->responSuccess(200, 'Blog Berhasil Ditambahkan !', $blog);
    }

    public function update(Request $request, Blog $blog)
    {
        {
            $token = $request->bearerToken();
            $user = User::where('api_token', $token)->first();
            if (empty($user)) {
                return $this->responAuthFailed(301, 'Anda tidak memiliki ijin !', 'Failed');
            }
    
            $request['created_user_id'] = $user->id;
                
            if ($request->file('image') == "") {
    
                //hapus old image
                Storage::disk('public')->delete('public/blogs/' . $blog->image);
    
                //upload new image
            }else {
                $image = $request->file('image');
                $image->storeAs('/blogs', $image->hashName());
            }
    
            $blog = $this->BlogService->update($request->all());
            return $this->responSuccess(200, 'Blog Berhasil Diupdate !', $blog);
        }
    }

    public function delete($id)
    {
        $blogs = $this->BlogService->delete($id);
        return $this->responSuccess(200, 'Success', $blogs);
    }
}