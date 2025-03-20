<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model
{
    use HasFactory;

    // Definindo os campos que podem ser preenchidos via mass assignment
    protected $fillable = [
        'user_id',
        'cpf',
        'data_nascimento',
        'sexo',
        'estado_civil',
        'escolaridade',
        'cursos_especializacoes',
        'experiencia_profissional',
        'pretensao_salarial',
    ];

    // Relacionamento: Um currículo pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
