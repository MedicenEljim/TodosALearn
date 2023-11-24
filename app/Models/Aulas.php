<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aulas extends Model
{
    protected $table = 'aulas';

    protected $primaryKey = 'ID_aula';

    public $timestamps = false;

    protected $fillable = [
        'Nombre_del_aula', 'num_estudiantes' 
    ];

    public function profesores()
    {
        return $this->belongsToMany(Profesores::class, 'profesoresaulas', 'ID_aula', 'Profesores_ID');
    }
}