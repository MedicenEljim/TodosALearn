<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfesoresTest extends TestCase
{
    
    public function test_obtener_todos_los_profesores_y_aulas_asociadas(): void
    {
        $response = $this->get('/api/v1/profesores');

        $response->assertStatus(200)
            ->assertJsonStructure([
                
                '*' => ['Profesores_ID', 'Nombre', 'Apellidos', 'Horario', 'Cedula']
            ]);
    }

    public function test_ver_un_profesor(): void
    {
       
        $profesorId = 11;

        $response = $this->get("/api/v1/profesores/$profesorId");

        $response->assertStatus(200)
            ->assertJsonStructure([
               
                'Profesores_ID', 'Nombre', 'Apellidos', 'Horario', 'Cedula'
            ]);
    }

    public function test_actualizar_profesor(): void
    {
        
        $profesorId = 11;

        $response = $this->put("/api/v1/profesores/$profesorId", [
            'Nombre' => 'Paola',
            'Apellidos' => 'Urrego Montes',
            'Horario' => '10:30:00',
            'Cedula' => '100401293',
            'ID_aula' => '3'
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Profesor actualizado con éxito',
            ]);
    }
}