<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Turma extends Model
{
    use HasFactory;
            
    protected $fillable = [
        'school_id',
        'name',
        'year',
        'active',
        'startDate',
        'endDate'
    ];


    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function disciplines():HasMany 
    {
        return $this->hasMany(Discipline::class);
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
