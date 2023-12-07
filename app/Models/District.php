<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';

    protected $fillable = [
        'name', 'province_id'
    ];

    protected $primaryKey = 'id';

    public function province(){
        return $this->belongsTo(Province::class);
    }

    public function wards(){
        return $this->hasMany(Ward::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

}
