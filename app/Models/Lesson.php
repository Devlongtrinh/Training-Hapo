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
        'documents',
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
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
