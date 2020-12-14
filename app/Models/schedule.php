<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    protected $table = 'schedule';
    protected $fillable = [
        'prod_id', 'customer','email','address','SDT', 
        'appointmentSchedule', 'message'
    ];
}
