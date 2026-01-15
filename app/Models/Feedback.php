<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable=[
        'user_id','to_employee',
        'category','message','anonymous'
    ];

    public function sender(){
        return $this->belongsTo(User::class,'from_user');
    }
}
