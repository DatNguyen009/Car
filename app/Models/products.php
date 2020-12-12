<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'prod_name', 'prod_cost','prod_img','prod_description','prod_DRC', 
        'prod_Weight', 'prod_Engine', 'prod_HorsePower', 'prod_MaxCapacity',
        'prod_MaxTorque','prod_Acceleration','prod_MaxSpeed','prod_TypeOfFuel',
        'prod_City', 'prod_Combine','prod_Local', 'color', 'amount'
    ];
}
