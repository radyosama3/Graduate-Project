<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'course_id',
        'name',
        'description',
        'thumbnail',
        'is_active',
    ];
    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function lectures(){
        return $this->hasMany(Lecture::class,'course_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_has_courses')
                    ->withPivot('grade')
                    ->withTimestamps();
    }
 

}
