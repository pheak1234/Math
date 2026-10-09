<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[\Illuminate\Database\Eloquent\Attributes\Fillable(['math_exam_id', 'question_text', 'image', 'points', 'order'])]
class ExamQuestion extends Model
{
    public function options() { return $this->hasMany(ExamOption::class); }
    public function exam() { return $this->belongsTo(MathExam::class, 'math_exam_id'); }
}
