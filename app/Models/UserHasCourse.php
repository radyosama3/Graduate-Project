<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHasCourse extends Model
{
    use HasFactory;

    
    protected $table = 'user_has_courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'course_id',
        'grade',
    ];

    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
}
