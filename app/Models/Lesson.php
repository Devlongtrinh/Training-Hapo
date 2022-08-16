<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'description',
        'tag',
        'time',
        'cost',
        'document',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function scopeSearch($query, $request)
    {
        if (isset($request['keyword']) && !empty($request['keyword'])) {
            $query->where('name', 'LIKE', "%{$request['keyword']}%");
        }
        return $query->orderBy('num', config('course_home.sort_ascending'));
    }
}
