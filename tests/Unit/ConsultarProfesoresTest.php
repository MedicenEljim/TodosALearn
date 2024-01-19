<?php
namespace Tests\Unit;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
class ConsultarProfesoresTest extends TestCase
{

 //Test para obtener todos los profesoresn y aulas asociadas 
 public function test_obtener_todos_los_profesores_y_aulas_asociadas(): void
 {
 $response = $this->get('/api/v1/profesores');
 $response->assertStatus(200);
 }
}

