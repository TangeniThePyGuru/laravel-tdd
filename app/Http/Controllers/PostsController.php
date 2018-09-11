<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index($id)
    {
        $post = Post::find($id);

        return view('post')->withPost($post);

    }
}
