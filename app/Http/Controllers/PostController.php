<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use View;
use Log;
use Carbon;
use Auth;

class PostController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        if (Auth::user()) {
            $posts = Post::all();
        } else {
            $posts = Post::active()->with('user')->get();
        }
        $returnData['posts'] = $posts;
        return View::make('post.index', $returnData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        //Some versions of mysql does not accept more than one timestamp, that's why I handle it in the controller
        $published_at = Carbon\Carbon::now();
        $post = new Post;
        $post->published_at = $published_at->toDateTimeString();
        $returnData['post'] = $post;

        return View::make('post.create', $returnData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request) {
        $post = $request->all();

        $post_new = Post::create($post);
        return $this->edit($post_new->id, true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) {
        $returnData['post'] = $post;
        return View::make('post.show', $returnData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $show_success_message = false) {
        //public function edit(Posts $posts) {
        $post = Post::find($id);
        $mensage_success = "Saved"; //trans('message.saved.success');
        $returnData['post'] = $post;
        if (!$show_success_message) {
            return View::make('post.edit', $returnData);
        } else {
            return View::make('post.edit', $returnData)->withSuccess($mensage_success);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id) {
        $postUpdate = $request->all();
        $postUpdate["active"] = $request->exists('active') ? true : false;
        $post = Post::find($id);
        $post->update($postUpdate);
        return $this->edit($post->id, true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Post::find($id)->delete();
        return redirect('post');
    }

    public function delete($id) {

        $post = Post::find($id);
        $returnData['post'] = $post;

        return View::make('post.delete', $returnData);
    }

}
