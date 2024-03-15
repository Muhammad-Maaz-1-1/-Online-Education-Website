<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programModel extends Model
{
    use HasFactory;
    protected $fillabale = ['title', 'image', 'description', 'lectures', 'durations', 'skill', 'language', 'price', 'category_id', 'instructor_id'];
}
