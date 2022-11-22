<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesUsers extends Model
{
    use HasFactory;
    protected $fillable = ['name','phoneNumber','service_id','user_id','status','is_deleted'];

}
