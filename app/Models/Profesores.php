<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesores extends Model
{
    protected $table = 'profesores'; 

    protected $primaryKey = 'Profesores_ID'; 

    public $timestamps = false; 

    protected $fillable = [
        'Nombre', 'Apellidos', 'Horario', 'Cedula'
    ];

    public function aulas()
    {
        return $this->belongsToMany(Aulas::class, 'profesoresaulas', 'Profesores_ID', 'ID_aula'); 
    }
}
