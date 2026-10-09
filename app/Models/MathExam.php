<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'grade_level', 'description', 'file_path', 'image', 'priority', 'is_popular', 'duration_minutes', 'passing_score'])]
class MathExam extends Model
{
    protected function casts(): array
    {
        return [
            'is_popular' => 'boolean',
        ];
    }

    public function questions() { return $this->hasMany(ExamQuestion::class); }
}