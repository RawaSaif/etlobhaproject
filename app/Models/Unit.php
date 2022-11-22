<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = ['title','file','course_id','status','is_deleted'];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function video()
    {
        return $this->hasMany(video::class);
    }
}