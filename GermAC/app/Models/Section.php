<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function doctors(){
        return $this->hasMany(Doctor::class);
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }

}
