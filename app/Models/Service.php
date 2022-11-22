<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
      protected $fillable = ['name','description','file','price','status','is_deleted'];

       public function users(){
       return $this->belongsToMany(
        User::class,
        'services_users',
        'service_id',
        'user_id'
        );
    }
}
