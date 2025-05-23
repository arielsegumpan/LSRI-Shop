<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'is_visible'
    ];

    public function commentable()
    {
        return $this->morphTo();
    }
}
