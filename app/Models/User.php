<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'phone',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $appends = [
        'photo_url', 
        'role', 
        'actions'
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // public function getPhotoUrlAttribute()
    // {
    //     if ($this->foto !== null) {
    //         return url('media/user/' . $this->id . '/' . $this->foto);
    //     } else {
    //         return url('media-example/no-image.png');
    //     }
    // }


    public function getPhotoUrlAttribute(){
        if($this->avatar !== null){
            return url('uploads/'.$this->avatar);
        }
    }
    public function getRoleAttribute()
    {
        if ($this->role_id >= 99)
            return 'Quản trị viên';
        return 'Khách hàng';
    }

    public function getActionsAttribute()
    {
        if ($this->role != 'admin')
            return '<div class="flex lg:justify-center items-center">
                            <a class="edit flex items-center mr-3" href="javascript:;" data-tw-toggle="modal" data-tw-target="#crud-user-modal" data-update-url="'.route('admin.users.update', $this).'" data-get-item="'.route('admin.users.getItem', $this).'" data-tw-toggle="modal" data-tw-target="#edit-user-modal" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="check-square" data-lucide="check-square" class="lucide lucide-check-square w-4 h-4 mr-1">
                                    <polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                </svg> 
                                Sửa
                            </a>
                            <a class="delete-user flex items-center text-danger" href="javascript:;" data-url="'.route('admin.users.destroy', $this).'"
                            data-tw-toggle="modal" data-tw-target="#delete-modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 w-4 h-4 mr-1">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17">
                                    </line><line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                                 Xóa
                            </a>
                        </div>';
        return "";
    }

    public function getHideLast3DigitsPhoneNumberAttribute(){
        $hide_last_no3 = substr_replace(substr($this->phone, 7), '***', -3);
        $phone_number = substr($this->phone, 0, 4) . ' ' . substr($this->phone, 4, 3) . ' ' . $hide_last_no3;
        return $phone_number;
    }

    public function getPhoneNumberFormatAttribute(){
        return substr($this->phone, 0, 4) . ' ' . substr($this->phone, 4, 3) . ' ' . substr($this->phone, 7);
    }

    public function logsSupport()
    {
        return $this->hasMany(LogsSupport::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function viewedPosts(){
        return $this->belongsToMany(Post::class, 'post_viewed', 'user_id', 'post_id')->withTimestamps();
    }

    public function favoritePosts(){
        return $this->belongsToMany(Post::class, 'favorite_post', 'user_id', 'post_id')->withTimestamps();
    }
}
