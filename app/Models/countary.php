<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class countary extends Model
{
    use HasFactory,Uuids;

    protected $fillable = [
        'code','geo',
        'cityName','longName',
    ];

}
