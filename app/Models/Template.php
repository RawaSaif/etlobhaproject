<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;
    protected $fillable = ['script_name','logo','comments_status','customers_status','package_id','status','is_deleted'];

          public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');

    }
}
