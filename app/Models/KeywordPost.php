<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KeywordPost extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "keyword_post";

    protected $fillabl = [
        'keyword_id',
        'post_id'
    ];

    protected $primaryKey = "id";
}
