<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Policies\UserPolicy;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin'
    ];
    
    // 添加访问器方便判断是否为管理员
    public function isAdmin()
    {
        return $this->is_admin;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function gravatar($size='100')
    {
        $hash=md5(strtolower(trim($this->attributes['email'])));
        return "https://dn-qiniu-avatar.qbox.me/avatar/$hash?s=$size";
    }
    public function feed()
    {
        return $this->statuses()
                    ->orderBy('created_at', 'desc');
    }
    
    public function statuses()
    {
        return $this->hasMany(Status::class);
    }
    
    // 删除这个重复的方法
    // public function followers()
    // {
    //     return $this->belongsToMany(User::class,'followers','user_id','follower_id');
    // }
    
    // 获取用户关注的人
    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }
    
    // 获取关注用户的粉丝
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }
    public function follow($user_ids)
    {
        if (! is_array($user_ids)){
            $user_ids=compact('user_ids');

        }
        $this->followings()->sync($user_ids,false);
    }
    
    public function unfollow($user_ids)
    {
        if (!is_array($user_ids)){
            $user_ids = [$user_ids];  // 修改这里，直接创建数组而不使用 compact
        }
        $this->followings()->detach($user_ids);
    } // 这里有一个多余的大括号需要删除
    
    public function isFollowing($user_id)
    {
        return $this->followings->contains($user_id);
    }
   
}
