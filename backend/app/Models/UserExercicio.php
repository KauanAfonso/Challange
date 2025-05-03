<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserExercicio extends Model
{
    use HasFactory;

    protected $table = 'user_exercicio';

    protected $fillable = [
        'user_id',
        'exercicio_id',
        'tempo',
        'exercicio',
        'feedback',
    ];
}
