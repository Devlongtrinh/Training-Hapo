<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'course_id',
        'review',
        'language',
        'rate',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function scopeMain($query)
    {
        return $query->take(config('course_home.review_num'))->get();
    }

    public function isYourReview()
    {
        return auth()->check() && auth()->id() == $this->user->id;
    }

    public function canUpdateReview()
    {
        return $this['user_id'] == auth()->id();
    }
}
