<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesores extends Model
{
    protected $table = 'profesores'; 

    protected $primaryKey = 'id'; 

    public $timestamps = false; 

    protected $fillable = [
        'Nombre', 'Apellidos', 'Horario'
    ];

    public function aulas()
    {
        return $this->belongsToMany(Aulas::class, 'profesores_aula', 'id', 'ID_aula'); 
    }
}
