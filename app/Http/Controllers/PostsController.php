<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostsController extends Controller
{
    public function index(): View
    {
        $posts = Auth::user()->posts()->get();

        return view('posts.index', [
            'posts' => $posts
        ]);
    }
    
    public function create(): View
    {
        return view('posts.create');
    }
    
    public function store(Request $request): RedirectResponse
    {
        $postTitle = $request->get('title');
        $postBody = $request->get('body');

        Auth::user()->posts()->create([
            'title' => $postTitle,
            'body' => $postBody
        ]);

        return redirect()->route('posts.index')->with('status', 'Post was created!');
    }

    public function show($id): View|RedirectResponse
    {
        $post = Post::find($id);

        if (Auth::user()->first()->id !== $post->user_id) {
            return redirect()->route('posts.index')->with('status', 'You don\'t have permission to view this post.');
        }

        return view('posts.show', [
            'post' => $post
        ]);
    }
}
