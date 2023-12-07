<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'parent_id',
        'type'
    ];

    protected $primaryKey = 'id';

    protected $appends = [
        'actions',
        'shortened_name',
       
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }
    public function realEstateType()
    {
        return $this->hasMany(Post::class, 'real_estate_type');
    }

    public function getActionsAttribute(): string
    {
        $route = '';
        if ($this->role != 'admin') {
            return '<div class="flex lg:justify-center items-center">
                        <a class="edit-category flex items-center mr-3" href="javascript:;" data-item-url="' . route('admin.categories.get-item', $this) . '"   data-update-url="' . route('admin.categories.update', $this) . '"  >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Sửa
                        </a>
                        <a class="delete-category flex items-center text-danger" href="javascript:;" data-url="' . route('admin.categories.destroy', $this) . '"
                        data-tw-toggle="modal" data-tw-target="#delete-modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                <polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2">
                                </path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg> Xóa
                        </a>
                    </div>';
        }
        return "";
    }

    public function getShortenedNameAttribute(){
        $shorten_name = 'Bán';
        if($this->name === 'Nhà đất cho thuê') $shorten_name = 'Cho thuê';
        elseif($this->name === 'Nhà đất trung gian') $shorten_name = 'Môi giới';
        return $shorten_name;
    }

    public function _children(){
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    // public function children(){
    //     return $this->hasMany(Category::class, 'parent_id', 'id');
    // }

}


