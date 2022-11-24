<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class website_socialmedia extends Model
{
    use HasFactory;
    protected $fillable = ['name','logo','link','status','is_deleted'];
}