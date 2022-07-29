<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aluno extends Model
{
    protected $table = 'aluno';
   
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nome',
        'email',
        'imagem',
        'data_nascimento'

    ];

    public function telefones()
    {
        return $this->hasMany(Telefone::class);
    }

   

    public function cursoes()
    {
        return $this->belongsToMany(Curso::class);
    }
    
}
