<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
      protected $fillable = ['name','monthly_price','yearly_price','discount','duration','end_at','status','is_deleted'];

      public function store()
    {
        return $this->hasMany(Store::class);
    }
      public function plans()
{
    return $this->belongsToMany(
        Plan::class,
        'packages_plans',
        'plan_id',
        'package_id'
        );
    }
}

