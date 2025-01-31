<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ticket extends Model
{
    use HasFactory,Uuids;

    protected $fillable = [
        'ticket_id','order_id',
        'flightline_id'      
    ];

    public function order()
    {
        return $this->hasOne('App\Models\Order','order_id');
    }
}
