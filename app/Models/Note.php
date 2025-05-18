<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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


    public function student(): belongsTo
    {
        return $this->belongsTo(Student::class);
    }

     public function discipline():BelongsTo
    {
        return $this->belongsTo(Discipline::class);
    }
}
