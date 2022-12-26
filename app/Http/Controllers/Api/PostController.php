<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostFullResource;
use App\Http\Resources\PostResource;
use Illuminate\Http\Response;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Contracts\Database\Eloquent\Builder;


// publish
class PostController extends Controller
{
    public function getPosts() 
    {
        $posts = Post::orderBy('created_at','desc')->where('status','on-check')->get();

        return PostResource::collection($posts);
            
    }

    public function showPost(Post $post)
    {   
        return PostFullResource::make($post);
    }
}
