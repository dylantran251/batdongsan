<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keyword extends Model
{
    use HasFactory, SoftDeletes;


    protected $table = "keyword";

    protected $fillable = [
        'name'
    ];

    protected $primaryKey = "id";

    public function posts(){
        return $this->belongsToMany(Post::class, 'keyword_post', 'keyword_id', 'post_id')->withTimestamps();
    }
}
