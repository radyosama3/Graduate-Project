<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;
    protected $table = 'questions';

    // Fillable properties for mass assignment
    protected $fillable = [
        'question_text',
        'course_id',
    ];

    /**
     * Get the answers for the question.
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    /**
     * Get the course that owns the question.
     */
    public function courses()
    {
        return $this->belongsTo(Course::class);
    }
}
