<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicalSupport extends Model
{
    use HasFactory;
        protected $fillable = ['title','phoneNumber','content','type','activity_id','store_id','status','is_deleted'];
        public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id', 'id');
    }
          public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');

    }

}
