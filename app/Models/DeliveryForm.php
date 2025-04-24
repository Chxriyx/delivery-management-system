<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryForm extends Model
{
    protected $fillable = [
        'pickup_address',
        'pickup_name',
        'pickup_contact',
        'pickup_email',
        'delivery_address',
        'delivery_name',
        'delivery_contact',
        'delivery_email',
        'type_of_good',
        'delivery_provider',
        'priority',
        'pickup_date',
        'pickup_time',
        'package_description',
        'length',
        'height',
        'width',
        'weight',
        'status',
    ];
}
