<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\CreatePostRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
    
        return view('pages.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $file = $request->file('file');

        if ($file) {
            $path = str_replace('public/', '', $request->file('file')->store('public'));

            $request->request->add(['image_path' => $path, 'user_id' => 1]);
        }

        $post = Post::create($request->except('file'));

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        
        return view('pages.posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        
        return view('pages.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Post::findOrFail($id)->update($request->all());

        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id)->delete();

        return redirect('posts');
    }

    public function getTrashRecords()
    {
        $post = Post::onlyTrashed()->get();

        return $post;
    }

    public function restore()
    {
        $posts = Post::withTrashed()->whereIsAdmin(0)
                    ->get()->map(function($post) {
                        $post->restore();
                    });
    }

    public function forceDelete($id)
    {
        $post = Post::findOrFail($id)->forceDelete();

        if ($post) return "Deleted successfully";
        else return "Something went wrong";
    }
}
