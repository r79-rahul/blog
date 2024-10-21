<?php

namespace App\Observers;

use App\Models\{
    Comment,
    User,
    Post,
};
use Illuminate\Support\Facades\Mail;

class CommentObserver
{
    /**
     * Handle the Comment "created" event.
     */
    public function created(Comment $comment): void
    {
        // \DB::table('test_observer')
        //     ->insert([
        //         'info' => json_encode(($comment->toArray()))
        //     ]);
        $userId = Post::where('id', $comment->post_id)
            ->value('created_by');
        $user = User::where([ 'id' => $userId, ])
            ->first(['email', 'name']);

        Mail::to($user->email)
        ->send(new \App\Mail\CommentEmail($comment, $user));
    }

    /**
     * Handle the Comment "updated" event.
     */
    public function updated(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "deleted" event.
     */
    public function deleted(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "restored" event.
     */
    public function restored(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "force deleted" event.
     */
    public function forceDeleted(Comment $comment): void
    {
        //
    }
}
