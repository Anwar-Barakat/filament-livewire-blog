<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $featuredPosts  = Post::published()->featured()->latest()->inRandomOrder()->take(3)->get();
        $latestPosts    = Post::published()->latest()->inRandomOrder()->take(9)->get();
        // dd($featuredPosts);

        return view('home', ['featuredPosts' => $featuredPosts, 'latestPosts' => $latestPosts]);
    }
}
