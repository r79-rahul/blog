<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'post_id',
        'created_by'
    ];

    public static function postComments(array $posts) {
        return DB::table('comments as p')
            ->whereIn('post_id', $posts)
            ->get();
    }
}
