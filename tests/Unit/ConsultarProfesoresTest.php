<?php
namespace Tests\Unit;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
class ConsultarProfesoresTest extends TestCase
{

 //Test para obtener todos los profesores
 public function test_obtener_todos_los_profesores(): void
 {
 $response = $this->get('/api/v1/profesores');
 $response->assertStatus(200);
 }
}

