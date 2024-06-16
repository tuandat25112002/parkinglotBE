<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $primarykey = 'id';

    protected $fillable = [
        'comment', 'ranking', '',

    ];

    protected $table = 'comments';
}
