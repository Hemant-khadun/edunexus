<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'active',
        'grade',
        'subject'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
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

    public function getRoleAttribute()
    {
        switch ($this->attributes['role']) {
            case 1:
                return 'Administrator';
            case 2:
                return 'Parent';
            case 3:
                return 'Tutor';
            case 4:
                return 'Student';
            default:
                return 'Unknown Role';
        }
    }

    public function getFollowers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'followers', 'course_id', 'follower_id');
    }

    public function manageFollowings(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'course_id');
    }

    public function getFollowerById(Int $followerId, Int $courseId, Int $status = 0)
    {
        if(auth()->user()->role == 'Tutor'){
            $response = Followers::where('id', $courseId)->where('status', $status)->get()->isEmpty();
        }else{
            $response = Followers::
            where('course_id', $courseId)
            ->where('follower_id', $followerId)
            ->where('status', $status)
            ->value('id');
        }

        return $response ? true : false;
    }
    
}
