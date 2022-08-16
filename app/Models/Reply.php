<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'review_id',
        'reply',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    public function canUpdateReply($request)
    {
        return $this['user_id'] == auth()->id();
    }

    public function isYourReply()
    {
        return auth()->check() && auth()->id() == $this->user->id;
    }
}
