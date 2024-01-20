<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'sessionId',
        'customer_email',
        'payment_method_type',
        'payment_status'

    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
