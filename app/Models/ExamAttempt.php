<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[\Illuminate\Database\Eloquent\Attributes\Fillable(['user_id', 'math_exam_id', 'score', 'status', 'started_at', 'completed_at'])]
class ExamAttempt extends Model
{
    protected function casts(): array { return ['started_at' => 'datetime', 'completed_at' => 'datetime']; }
    public function exam() { return $this->belongsTo(MathExam::class, 'math_exam_id'); }
    public function user() { return $this->belongsTo(User::class); }
    public function answers() { return $this->hasMany(ExamAnswer::class); }
}
