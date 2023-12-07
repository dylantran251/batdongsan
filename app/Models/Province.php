<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'provinces';

    protected $fillable = [
        'name', 'code'
    ];

    protected $primaryKey = 'id';

    public function districts(){
        return $this->hasMany(District::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

}
