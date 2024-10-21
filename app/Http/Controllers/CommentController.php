<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Auth;
use Illuminate\Support\Facades\Validator;

// use Illuminate\Validation\Validator;

class CommentController extends Controller
{
    // public function index() {
    //     return view('');
    // }

    public function store(Request $request, $text) {
        if (!$text) {
            return ['type' => 'error', 'msg' => 'Comment text is empty!'];
        }
        $validator = Validator::make(
            $request->all(),
            [ 'postId' => 'required' ], // validation rules
            [ 'postId.required' => 'Something went wrong' ] // validation messages
        );

        if($validator->fails()) {
            return ['type' => 'error', 'msg' => $validator->errors()->first()];
        }


        $user = Auth::user()->toArray();

        Comment::create([
            'content' => $text,
            'post_id' => base64_decode($request->input('postId')),
            'created_by' => $user['id'],
        ]);

        // Send email here

        return ['type' => 'success', 'msg' => 'Comment added successfully!'];
    }
}
