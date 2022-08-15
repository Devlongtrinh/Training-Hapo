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
        return $this->users()->where('role', config('roles.user'))->count();
    }

    public function getLessonsAttribute()
    {
        return $this->lessons()->count();
    }

    public function getTimesAttribute()
    {
        return ($this->lessons()->sum('time') == 0) ? 0 : $this->lessons()->sum('time');
    }

    public function getCostsAttribute()
    {
        return ($this->cost == 0) ? __('artribute.free') : $this->cost;
    }

    public function getZeroStarsAttribute()
    {
        return $this->reviews()->where('rate', 0)->count();
    }

    public function getOneStarAttribute()
    {
        return $this->reviews()->where('rate', 1)->count();
    }

    public function getTwoStarsAttribute()
    {
        return $this->reviews()->where('rate', 2)->count();
    }

    public function getThreeStarsAttribute()
    {
        return $this->reviews()->where('rate', 3)->count();
    }

    public function getFourStarsAttribute()
    {
        return $this->reviews()->where('rate', 4)->count();
    }

    public function getFiveStarsAttribute()
    {
        return $this->reviews()->where('rate', 5)->count();
    }

    public function getIsJoinedAttribute($query)
    {
        return auth()->check() && $this->users()->whereExists(function ($query) {
            $query->where('users.id', auth()->id());
        })->count();
    }

    public function getIsReviewedAttribute()
    {
        return auth()->check() && $this->reviews()->whereExists(function ($query) {
            $query->where('user_id', auth()->id());
        })->count();
    }

    public function getIsFinishedAttribute()
    {
        return auth()->check() && $this->where('id', $this->id)->whereHas('users', function ($query) {
            $query->where('users.id', auth()->id())->where('course_user.deleted_at', '<>', 'null');
        })->exists();
    }

    public function getExperienceAttribute()
    {
        return Carbon::parse($this['created_at'])->diff(Carbon::now())->format('%y');
    }

    public function getAveragesAttribute()
    {
        $sum = $this->reviews->sum('rate');
        $total = $this->reviews->count();

        return $total == 0 ? 0 : round($sum / $total, 1);
    }

    public function scopeSearch($query, $request)
    {
        if (isset($request["keyword"]) && !empty($request["keyword"])) {
            $query->where('name', 'LIKE', "%{$request["keyword"]}%")->orWhere('description', 'LIKE', "%{$request["keyword"]}%");
        }

        if (isset($request["created_time"]) && !empty($request["created_time"])) {
            $query->orderBy('courses.created_at', $request["created_time"]);
        }

        if (isset($request["learners"]) && !empty($request["learners"])) {
            $query->withCount('users')->orderBy('users_count', $request["learners"]);
        }

        if (isset($request["learning_time"]) && !empty($request["learning_time"])) {
            $query->withSum('lessons', 'time')->orderBy('lessons_sum_time', $request["learning_time"]);
        }

        if (isset($request["lesson_counting"]) && !empty($request["lesson_counting"])) {
            $query->withCount('lessons')->orderBy('lessons_count', $request['lesson_counting']);
        }

        if (isset($request["rate"]) && !empty($request["rate"])) {
            $query->withCount('reviews')->orderBy('reviews_count', $request["rate"]);
        }

        if (isset($request["tags"]) && !empty($request["tags"])) {
            $query->whereHas('tags', function ($query) use ($request) {
                $query->whereIn('tags.id', $request['tags']);
            });
        }

        if (isset($request["teachers"]) && !empty($request["teachers"])) {
            $query->whereHas('users', function ($query) use ($request) {
                $query->whereIn('users.id', $request['teachers']);
            });
        }

        return $query;
    }
}
