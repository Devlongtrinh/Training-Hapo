<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable, softDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name',
        'email',
        'password',
        'role',
        'name',
        'd_o_b',
        'phone',
        'address',
        'avatar',
        'experience',
        'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function courses()
    {
        return $this->belongsToMany(Courses::class);
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }

    public function reviews()
    {
        return $this->haveMany(Review::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function scopeTeachers($query)
    {
        return $query->where('role', config('roles.teacher'));
    }

    public function getIsTeacherAttribute()
    {
        return $this->role == config('roles.teacher');
    }

    public function getExperienceAttribute()
    {
        return Carbon::parse($this['created_at'])->diff(Carbon::now())->format('%y');
    }
}
