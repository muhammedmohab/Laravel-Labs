<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Post ;
use App\Models\User ;
use Carbon\Carbon ;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(20);
        return view("posts",["posts"=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        return view("add",["users"=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $request_data = $request->validated();
        $post = new Post();
        $post->title =$request_data["title"];
        $post->discription =$request_data["discription"];
        $post->user_id = $request_data["user"];
        $post->save();
        return to_route("posts.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $date=Carbon::parse($post['created_at'])->format("d-m-y");
        return view("view",["post"=>$post],["date"=>$date]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users=User::all();
        $post = Post::findOrFail($id);
        return view("update",["post"=>$post,"users"=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request,$id)
    {
        $validated = $request->validated();
        $updatedpost = Post::findOrFail($id);
        $updatedpost->title = request("title");
        $updatedpost->discription = request("discription");
        $updatedpost->user_id = request("user");
        $updatedpost->save();
        return to_route("posts.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return to_route("posts.index");
    }
}
