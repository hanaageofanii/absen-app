<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
protected $fillable=[
        'user_id','company_id',
        'letter_number','letter_date',
        'subject','letter_to'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
