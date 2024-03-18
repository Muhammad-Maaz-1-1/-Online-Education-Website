<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoryModel extends Model
{
    use HasFactory;
    protected $fillabale = ['name'];
    public function programs()
    {
        return $this->hasMany(ProgramModel::class, 'category_id');
    }
}
