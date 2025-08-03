<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
protected $fillable = [
         'owner',
        'type',
        'size',
        'license_number',
        'start_date',
        'end_date',
        'coordinates',
        'category',
        'location',
        'road_class',
        'national_id',
        'qr_code',
];

}
