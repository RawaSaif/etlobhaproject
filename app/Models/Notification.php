<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','type_id','description','notification_time','status','is_deleted'];



    public function notification_type()
    {
        return $this->hasOne(Notification_type::class,'type_id','id');
    }}