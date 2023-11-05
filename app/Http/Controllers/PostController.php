<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::whereHas('posts', fn ($q) => $q->published())->get();
        return view('blog.posts.index', ['categories' => $categories]);
    }

    public function show(Post $post)
    {
        return view('blog.posts.show', ['post' => $post]);
    }
}