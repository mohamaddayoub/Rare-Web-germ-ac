<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'currency',
        'price',
        'date',
        'time',
        'rate',
    ];

    public function doctors(){
        return $this->belongsToMany(Doctor::class , 'course_doctor');
    }
    public function section(){
        return $this->belongsTo(Section::class);
    }
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

}
