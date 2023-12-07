<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FavoritePost extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "favorite_post";

    protected $fillable = [
        'post_id',
        'user_id'
    ];

    protected $primaryKey = 'id';

}
