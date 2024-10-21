<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use DB;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'created_by'
    ];

}
