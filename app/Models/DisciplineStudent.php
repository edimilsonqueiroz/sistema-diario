<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisciplineStudent extends Model
{
    protected $table = 'discipline_student';

    protected $fillable = [
        'discipline_id',
        'student_id'
    ];
}
