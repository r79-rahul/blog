<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Auth;
use App\Models\Comment;

class PostController extends Controller
{
    /**
     * Validate and create post
     * */

    public function createPost(Request $request)
    {
        if (!$request->input('content')) {
            return redirect()->to('dashboard')->with('error', 'Please provide Post Content');
        }
        $user = Auth::user()->toArray();
        
        Post::create([
            'content' => $request->input('content'),
            'created_by' => $user['id']
        ]);

        return redirect()->to('dashboard');
    }

    public function posts() {
        $posts = Post::all();
        $postComments = Comment::postComments($posts->pluck('id')->toArray());
        $posts = $posts->toArray();

        // $posts = [];
        $comments = [];
        foreach ($postComments as $pc) {
            $comments[$pc->post_id][] = (array) $pc;
        }

        return view('posts', [
            'posts' => $posts,
            'comments' => $comments,
        ]);
    }
}