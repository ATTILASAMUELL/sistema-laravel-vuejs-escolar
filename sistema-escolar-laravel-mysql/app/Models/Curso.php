<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'curso';
    
    protected $fillable = [
        'id',
        'nome'
    ];
    use HasFactory;
    public $timestamps = false;

    public function alunos()
    {
        return $this->belongsToMany(Aluno::class);
    }
    
}
