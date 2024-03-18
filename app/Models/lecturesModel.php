<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lecturesModel extends Model
{
    use HasFactory;
    protected $fillabale = ['title', 'video', 'description', 'course_id'];
    public function course()
    {
        return $this->belongsTo(enrollmentModel::class, 'course_id');
    }
    public function enrollment()
    {
        return $this->hasMany(enrollmentModel::class, 'course_id');
    }
}
