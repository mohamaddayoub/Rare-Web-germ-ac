<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'image',
        'description',
        'specialization',
        'rate'
    ];

    public function courses(){
        return $this->belongsToMany(Course::class , 'course_doctor');
    }

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function  cosulutions(){
        return $this->hasmany(Cosulution::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

}
