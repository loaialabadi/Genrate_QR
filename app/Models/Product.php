<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
protected $fillable = [
    'owner', 'type', 'size', 'license_number',
    'start_date', 'end_date', 'coordinates', 'qr_code'
];

}
