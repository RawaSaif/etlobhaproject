<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
        protected $fillable = ['code','discount_type','total_price','discount','discount_percent','less_of_total_Purchases','expire_date','total_redemptions','user_redemptions','free_shipping','exception_discount_product','status','is_deleted'];

           public function users()
    {
       return $this->belongsToMany(
        User::class,
        'coupons_users',
        'coupon_id',
        'user_id'

        );
    }

}
