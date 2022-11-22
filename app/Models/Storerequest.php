<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storerequest extends Model
{
    use HasFactory;

         public function shippingcompanies()
    {
        return $this->belongsToMany(
        Shippingcompany::class,
        'shippingcompanies_storerequests',
        'storerequest_id',
        'shippingcompany_id'
        );
    }

          public function payments()
    {
        return $this->belongsToMany(
        Payment::class,
        'payments_storerequests',
        'storerequest_id',
        'payment_id'
        );
    }
}
