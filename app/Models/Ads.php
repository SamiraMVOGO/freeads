<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Ads extends Model
{
 
    protected $fillable = [
        'title',
        'price',
        'location',
        'description',
        'category_id',
        'slug',
    ]; 

 
public function category()
{
  return $this->belongsTo(Category::class, 'category_id');

}

public function user()
{
  return $this->belongsTo(User::class, 'user_id');

}
}
