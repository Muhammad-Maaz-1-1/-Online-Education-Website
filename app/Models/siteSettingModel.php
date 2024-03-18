<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siteSettingModel extends Model
{
    use HasFactory;
    protected $fillabale = ['logo', 'address', 'phone', 'email','location'];
}
