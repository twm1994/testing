<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    //
    public function index(){

    }
    public function show(){

    }
    public function create(){

    }
    public function store(Post $post){
        $this->validate(request(),[
            'body' => 'required|min:3'
        ]);
        // $post->addComment(request('body'));
        // // Comment::create([
        // //   'body' => $body,
        // //   'post_id' => $post->id
        // // ]);
        // // return redirect('/');
        // return back();
        if(auth()->check()){
            auth()->user()->addComment($post->id, request('body'));
            // \App\Post::create(request(['title','body']));
            // Post::create(request(['title','body']));
            // Post::create([
            //     'title' => request('title'),
            //     'body' => request('body'),
            //     'user_id' => auth()->id()
            // ]);
            return redirect()->back();
        }else{
            return redirect()->home();
        }
    }
}
