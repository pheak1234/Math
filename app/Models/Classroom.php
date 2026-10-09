<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Classroom extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'teacher_id',
        'code',
        'title',
        'room',
        'grade_level',
        'schedule',
        'capacity',
        'enrolled_count',
        'status',
    ];

    /**
     * @return BelongsTo<Teacher, $this>
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }
}
