<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shippingcompany extends Model
{
    use HasFactory;
    protected $fillable = ['name','status','is_deleted'];
    
      public function storerequests()
{
    return $this->belongsToMany(
        Storerequests::class,
        'shippingcompanies_storerequests',
        'shippingcompany_id',
        'storerequest_id'

        );
    }

}
