<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostManagerController extends Controller
{
    public function addPost(PostRequest $request) 
    {
        $post = Auth::user()->posts()->create($request->validated());
        $post->uploadCover($request->file('cover_file'));

        return response()->noContent();
    }

    public function delete(Post $post)
    {
        if ($post->user_id != Auth::user()->id) {
            return response()->json([
                'message' => 'нет доступа'
            ], 403);
        }

        $post->delete();
        
        return response()->noContent();
    }
}
