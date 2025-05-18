<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'name',
        'email',
        'telephone',
        'cpf',
        'rg',
        'sex',
        'fatherName',
        'matherName',
        'dateBirth',
        'current_class',
        'status',
        'enturmacao'
    ];

    public function turmas(): BelongsToMany
    {
        return $this->belongsToMany(Turma::class);
    }

    public function disciplines(): BelongsToMany
    {
        return $this->belongsToMany(Discipline::class);
    }

    public function notes(): HasOne
    {
        return $this->hasOne(Note::class);
    }
}
