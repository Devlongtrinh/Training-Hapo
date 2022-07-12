<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documents extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'document_name',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
