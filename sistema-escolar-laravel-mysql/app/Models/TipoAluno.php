<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipoaluno extends Model
{
    protected $table = 'tipoaluno';
    use HasFactory;
    

    public $timestamps = false;

    protected $fillable = [
        'tipoaluno'

    ];

    public function aluno()
    {
        return $this->belongsTo(aluno::class);
    }
}
