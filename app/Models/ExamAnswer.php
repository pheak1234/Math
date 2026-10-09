<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[\Illuminate\Database\Eloquent\Attributes\Fillable(['exam_attempt_id', 'exam_question_id', 'exam_option_id', 'is_correct'])]
class ExamAnswer extends Model
{
    protected function casts(): array { return ['is_correct' => 'boolean']; }
    public function attempt() { return $this->belongsTo(ExamAttempt::class, 'exam_attempt_id'); }
    public function question() { return $this->belongsTo(ExamQuestion::class, 'exam_question_id'); }
    public function option() { return $this->belongsTo(ExamOption::class, 'exam_option_id'); }
}
