<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Exercicio extends Model{

    use HasFactory;

    protected $table = 'exercicios'; 
    protected $fillable = [
        'nome',
        'imagem',
        'descricao'
    ];

    public function user(){
        return $this->belongsToMany(User::class, 'user_exercicio')
            ->withPivot('tempo', 'exercicio', 'feedback')
            ->withTimestamps();
    }
}
