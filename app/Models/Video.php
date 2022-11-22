<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = ['video','unit_id','status','is_deleted'];
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}