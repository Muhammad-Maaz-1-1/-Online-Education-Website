<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coursesModel extends Model
{
    use HasFactory;
    protected $fillabale = ['title', 'image', 'description', 'lectures', 'durations', 'skill', 'languages', 'price', 'category_id'];
}
