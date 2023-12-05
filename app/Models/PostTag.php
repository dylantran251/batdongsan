<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostTag extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'post_tag';

    protected $fillable = [
        'tag_id',
        'post_id'
    ];

    protected $primaryKey = 'id';
}