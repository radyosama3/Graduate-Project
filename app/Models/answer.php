<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    use HasFactory;
    protected $table = 'answers';

    // Fillable properties for mass assignment
    protected $fillable = [
        'answer_text',
        'question_id',
        'user_id',
    ];


    public function questions()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Get the user that owns the answer.
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
