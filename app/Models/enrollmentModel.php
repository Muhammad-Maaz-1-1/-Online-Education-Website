<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enrollmentModel extends Model
{
    use HasFactory;

    protected $fillbale = ['user_id', 'course_id', 'status'];
    public function course()
    {
        return $this->belongsTo(programModel::class, 'course_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function lecture()
    {
        return $this->belongsTo(lecturesModel::class, 'course_id');
    }
    

}
