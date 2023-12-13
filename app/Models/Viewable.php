<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Viewable extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'viewables';

    protected $fillable = ['user_id', 'viewable_id', 'viewable_type'];
}
