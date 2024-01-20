<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'url',
        'thumbnailUrl',
        // 'seen',
        'durationInSeconds',
    ];

    public function doctors(){
        return $this->belongsToMany(Doctor::class , 'course_doctor');
    }
    public function course(){
        return $this->belongsTo(Course::class );
    }
}
