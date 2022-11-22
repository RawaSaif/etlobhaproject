<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;
    protected $fillable = ['name','logo','link','setting_id','status','is_deleted'];
    public function setting()
    {
        return $this->belongsTo(Setting::class, 'setting_id', 'id');
    }
}