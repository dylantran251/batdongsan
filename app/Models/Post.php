<?php

namespace App\Models;

use App\Helper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

use function PHPUnit\Framework\returnSelf;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'posts';

    protected $fillable = [
        'user_id' ,           
        'category_id', 
        'province_id',
        'district_id',
        'ward_id',    
        // 'type' ,          
        'vip' ,             
        'title' ,            
        'description' ,     
        // 'short_description' , 
        'price' ,            
        'sub_price' ,       
        // 'location' ,       
        'area' ,           
        'status' ,         
        'images' ,           
        'floors' ,   
        'house_direction',
        'balcony_direction',     
        'bedroom' ,        
        'toilet' ,         
        'legal_documents' ,  
        'other_properties' , 
        'real_estate_type' ,      
        'created_at' ,
        'expired_at'         
    ];

    protected $primaryKey = 'id';
    
    protected $appends = [
        'location',
        'created_date',
        'expired_date',
        'currency_format',
        'sub_currency_format',
        'regular_price',
        'actions',
        'area_format',
        'date_difference',
        'vip_text',
        'avatar',
    ];

    protected $casts = [
        'images' => 'array',
        'other_properties' => 'array',
        'price' => 'float',
        'expired_at' => 'date',
    ];

    public function getAvatarAttribute(){
        $images = json_decode($this->images);
        if($images[0] !== null){
            return url('uploads/'.$images[0]);
        }
        return url('uploads/default.jpg');
    }

    public function getCreatedDateAttribute(){
        return ($this->created_at)->format('d-m-Y');
    }

    public function getExpiredDateAttribute(){
        return ($this->expired_at)->format('d-m-Y');
    }

    public function getDateDifferenceAttribute(){
        return Helper::dateDifference($this->created_at);
    }

    public function getCurrencyFormatAttribute(): string
    {
        $result = Helper::formatCurrencyVND($this->price);
        return $result;
    }

    public function getSubCurrencyFormatAttribute(): string
    {
        $result = Helper::formatCurrencyVND($this->sub_price);
        return $result;
    }

    public function getAreaFormatAttribute(): string
    {
        return number_format($this->area, 0, ',')." m&#178;";
    }

    public function getLocationAttribute(){
        $location = [];
    
        if ($this->ward) {
            $location[] = $this->ward->name;
        }
        if ($this->district) {
            $location[] = $this->district->name;
        }
        if ($this->province) {
            $location[] = $this->province->name;
        }
        return implode(', ', $location);
    }
    
    public function getActionsAttribute(): string
    {
        if ($this->role != 'admin') {
            return '<div class="flex lg:justify-center items-center">
                        <a class="edit-posts flex items-center mr-3" href="' . route('admin.posts.edit', $this) . '" data-update-url="' . '" data-get-item="' . route('admin.posts.get-item', $this) . '" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path></svg> Sửa
                        </a>
                        <a class="delete-posts flex items-center text-danger" href="javascript:;" data-url="'. route('admin.posts.destroy', $this) .'"
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

    public function getVipTextAttribute(){
        if($this->vip === 1){
            return 'Tin VIP bạc';
        }else if($this->vip === 2){
            return 'Tin VIP vàng';
        }else if($this->vip === 3){
            return 'VIP kim cương';
        }
        return 'Tin thường';
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function realEstateType()
    {
        return $this->belongsTo(Category::class, 'real_estate_type');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function viewed(){
        return $this->morphByMany(User::class, 'viewable');
    }

    public function favoriteByUsers(){
        return $this->belongsToMany(User::class, 'favorite_post', 'post_id', 'user_id')->withTimestamps();
    }

    public function keywords(){
        return $this->belongsToMany(Keyword::class, 'keyword_post', 'post_id', 'keyword_id')->withTimestamps();
    }

    public function province(){
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function district(){
        return $this->belongsTo(District::class, 'district_id');
    }

    public function ward(){
        return $this->belongsTo(Ward::class, 'ward_id');
    }

    public function getImages(){
        if (is_string($this->images)) {
            $images = json_decode($this->images);
        } else {
            $images = json_decode($this->images);
        }
        return $images;
    }

    public function getAvatar($num){
        $images = $this->getImages();
        if ( is_array($images) && !empty($images) && count($images) > $num) {
            return $images[$num];
        }else{
            return $images;
        }
        return ''; 
    }
}
