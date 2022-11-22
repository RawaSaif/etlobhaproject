<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['name','image','status','is_deleted'];

        public function storerequests()
{
    return $this->belongsToMany(
        Storerequests::class,
        'payments_storerequests',
        'payment_id',
        'storerequest_id'

        );
    }
}
