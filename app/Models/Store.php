<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
     protected $fillable = ['name','email','domain','phoneNumber','accountBankNumber','ID_file','accept',
     'start_at','end_at','user_id','activity_id','package_id','country_id','city_id','status','is_deleted'];
     public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
          public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');

    }
    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id', 'id');
    }
          public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');

    }
     public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function setting()
    {
        return $this->belongsTo(Setting::class, 'setting_id', 'id');
    }
    
    public function page()
    {
        return $this->hasMany(Page::class);
    }
}