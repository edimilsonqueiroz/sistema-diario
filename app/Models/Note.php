<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'turma_id',
        'discipline_id',
        'student_id',
        'bimonthly_1',
        'bimonthly_2',
        'bimonthly_3',
        'bimonthly_4' 
    ];


    public function students(): belongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
