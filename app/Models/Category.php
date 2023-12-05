<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'categories';
    protected $appends = [
        'shortened_name',
    ];
    protected $fillable = [
        'name',
        'parent_id',
        'level',
        'type'
    ];
    protected $primaryKey = 'id';
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }
    public function realEstateType()
    {
        return $this->hasMany(Post::class, 'real_estate_type');
    }

    public function getShortenedNameAttribute(){
        $shorten_name = 'Bán';
        if($this->name === 'Nhà đất cho thuê') $shorten_name = 'Cho thuê';
        elseif($this->name === 'Nhà đất trung gian') $shorten_name = 'Môi giới';
        return $shorten_name;
    }


}


