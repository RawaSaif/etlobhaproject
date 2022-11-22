<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','link','email','phoneNumber','logo','icon','address',
'country_id','city_id','status','is_deleted'];
public function city()
{
    return $this->belongsTo(City::class, 'city_id', 'id');
}
      public function country()
{
    return $this->belongsTo(Country::class, 'country_id', 'id');

}
public function store()
    {
        return $this->hasMany(Store::class);
    }
    public function SocialMedia()
    {
        return $this->hasMany(SocialMedia::class);
    }

}