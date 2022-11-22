<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = ['title','page_content','seo_title','seo_link','seo_desc','cat_pages','tags','status','store_id','is_deleted'];
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
   
}