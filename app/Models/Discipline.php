<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Discipline extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'turma_id',
        'user_id',
        'school_days',
        'days_week',
        'start_time',
        'end_time',
        'status'
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function turmas(): BelongsTo
    {
        return $this->belongsTo(Turma::class);
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }

    

    
}
