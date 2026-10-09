<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[\Illuminate\Database\Eloquent\Attributes\Fillable(['exam_question_id', 'option_text', 'is_correct'])]
class ExamOption extends Model
{
    protected function casts(): array { return ['is_correct' => 'boolean']; }
    public function question() { return $this->belongsTo(ExamQuestion::class, 'exam_question_id'); }
}
