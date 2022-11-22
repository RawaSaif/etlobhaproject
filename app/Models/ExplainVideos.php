<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExplainVideos extends Model
{
    use HasFactory;
    protected $fillable = ['title','video','thumbnail','user_id','status','is_deleted'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}