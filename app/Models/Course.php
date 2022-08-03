<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'description',
        'cost',
        'status',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeMain($query)
    {
        return $query->take(config('course_home.main_course_num'));
    }

    public function scopeOther($query)
    {
        return $query->orderBy('id', config('course_home.sort_descending'))->take(config('course_home.other_course_num'));
    }

    public function getLearnersAttribute()
    {
        return $this->users()->count();
    }

    public function getLessonsAttribute()
    {
        return $this->lessons()->count();
    }

    public function getTimesAttribute()
    {
        return $this->lessons()->sum('time');
    }

    public function scopeSearch($query, $request)
    {
        if (isset($request['keyword'])) {
            $query->where('name', 'LIKE', "%" . $request['keyword'] . "%")->orWhere('description', 'LIKE', "%" . $request['keyword'] . "%");
        }

        if (isset($request['created_time'])) {
            $query->orderBy('courses.created_at', $request['created_time']);
        }

        if (isset($request['teachers']) && count($request['teachers']) > 0) {
            $query->whereHas('users', function ($query) use ($request) {
                $query->where('users.role', config('roles.teacher'))->whereIn('user_id', $request['teachers']);
            });
        }

        if (isset($request['learner']) && !empty($request['learner'])) {
            $query->withCount('users')->orderBy('users_count', $request['learner']);
        }

        if (isset($request['time']) && !empty($request['time'])) {
            $query->withSum('lessons', 'time')->orderBy('lessons_sum_times', $request['time']);
        }

        if (isset($request['lesson']) && !empty($request['lesson'])) {
            $query->withCount('lessons')->orderBy('lessons_count', $request['lesson']);
        }

        if (isset($request['tags']) && count($request['tags']) > 0) {
            $query->whereHas('tags', function ($query) use ($request) {
                $query->whereIn('tag_id', $request['tags']);
            });
        }

        if (isset($request['rate']) && !empty($request['rate'])) {
            $query->withCount('reviews')->orderBy('reviews_count', $request['rate']);
        }

        return $query;
    }
}
