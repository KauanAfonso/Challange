<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versiculo extends Model
{
    /** @use HasFactory<\Database\Factories\VersiculoFactory> */
    use HasFactory;

    protected $fillable = [
        'meditacao', 'livro', 'capitulo', 'versiculo', //tipo o serializer do laravel
    ];

}
