<?php

namespace App\Models;

use App\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'news';

    protected $fillable = [
        'user_id',
        'category_id',
        'avatar',
        'title',
        'description',
        'content',
        'source',
        'note',
    ];

    protected $appends = [
        'actions',
        'photo_url',
        'date_difference'
    ];

    public function getDateDifferenceAttribute(){
        return Helper::dateDifference($this->created_at);
    }

    public function getPhotoUrlAttribute(){
        if($this->avatar !== null){
            return url('uploads/'.$this->avatar);
        }
        return url('uploads/default.jpg');
    }

    public function getActionsAttribute(): string
    {
        if ($this->role != 'admin') {
            return '<div class="flex lg:justify-center items-center">
                        <a class="edit-news flex items-center mr-3" href="' . route('admin.news.edit', $this) . '" data-update-url="' . '" data-get="' .''. '" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Sửa
                        </a>
                        <a class="delete-news flex items-center text-danger mr-3" href="javascript:;" data-url="'. route('admin.news.destroy', $this) .'"
                        data-tw-toggle="modal" data-tw-target="#delete-modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                <polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2">
                                </path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg> Xóa
                        </a>
                        <a class="delete-news flex items-center text-primary" href="javascript:;" data-url="'. '' .'"
                        data-tw-toggle="modal" data-tw-target="#delete-modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="eye" data-lucide="eye" class="lucide lucide-eye block mx-auto mr-1">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg> Xem
                        </a>
                    </div>';
        }
        return "";
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function viewed(){
        return $this->morphByMany(User::class, 'viewable');
    }
}
