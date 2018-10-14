<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Post;
Use Carbon\Carbon;

class PostController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth')->except(['index','show']);
    }
    public function index(){
        // $posts = Post::latest()->get();
        $posts = Post::latest();

        if ($month = request('month')) {
            $posts->whereMonth('created_at',Carbon::parse($month)->month);
        }

        if ($year = request('year')) {
            $posts->whereYear('created_at', $year);
        }

        $posts = $posts->get();

        $archives = Post::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
        // return $archives;
        return view('blogs.index',compact('posts', 'archives'));
    }
    // public function show($id){
    //     $post = Post::find($id);
    //     return view('blogs.show',compact('post'));
    // }
    public function show(Post $post){
        return view('blogs.show',compact('post'));
    }
    public function create(){
        return view('blogs.create');
    }
    public function hh(){
        dd(Post::all());
    }
    public function store(){
        // dd(request()->all());
        // dd(request(['title','body']));
        // $post = new \App\Post;
        // $post->title = request('title');
        // $post->body = request('body');
        // $post->save();
        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required'
        ]);
        if(auth()->check()){
            auth()->user()->publishPost(new Post(request(['title','body'])));
            // \App\Post::create(request(['title','body']));
            // Post::create(request(['title','body']));
            // Post::create([
            //     'title' => request('title'),
            //     'body' => request('body'),
            //     'user_id' => auth()->id()
            // ]);
            return redirect('/');
        }else{
            return redirect()->home();
        }
    }
}
