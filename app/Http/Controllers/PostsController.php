<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        try {

            $posts = Post::all();

        } catch (ModelNotFoundException $e) {
//            return view('404');
            abort(404, 'Page not found');
        }

        return view('posts')->withPosts($posts);

    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
//        Validator
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect('/posts');
    }

    public function show($id)
    {
        try {

            $post = Post::findOrFail($id);

        } catch (ModelNotFoundException $e) {
//            return view('404');
            abort(404, 'Page not found');
        }

        return view('post')->withPost($post);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }


}
