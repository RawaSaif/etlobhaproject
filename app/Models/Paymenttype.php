<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paymenttype extends Model
{
    use HasFactory;
     protected $fillable = ['name','image','status','is_deleted'];

    public function stores()
    {
     return $this->belongsToMany(
        Store::class,
        'paymenttypes_stores',
        'paymenttype_id',
        'store_id'

        );
    }
}
