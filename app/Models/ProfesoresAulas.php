<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfesoresAulas extends Model
{
    protected $table = 'profesoresaulas';

    protected $primaryKey = 'ID_ProfesoresAulas';

    public $timestamps = false;

    protected $fillable = [
        'ID_profesoresaulas', 'Profesores_ID', 'ID_aula'
    ];

    public function profesores()
    {
        return $this->belongsTo(Profesores::class, 'Profesores_ID', 'Profesores_ID');
    }

    public function aulas()
    {
        return $this->belongsTo(Aulas::class, 'ID_aula', 'ID_aula');
    }
}
