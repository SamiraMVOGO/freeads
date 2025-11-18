<?php

namespace App\Models;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UpdateAds extends Model
{
    //

    protected $fillable = [
        'title',
        'price',
        'location',
        'description',
        
        'slug',
    ]; 

}
