<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TagRelationship extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'taggables';

    protected $fillable = ['tag_id', 'taggable_id', 'taggable_type'];

}
