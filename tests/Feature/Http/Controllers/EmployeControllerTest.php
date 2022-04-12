<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeControllerTest extends TestCase
{
    use refreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_create_employe()
    {
        $this->withoutExceptionHandling(); 

        $user = User::factory()->create(); //crea un usuario
        $this->actingAs($user); //autentica el usuario

        $response = $this->post('/empleado', [
            'nombre' => 'oscar fiscal',
             'correo' => 'oscar@example.com',
             'sexo' => 'masculino',
             'area' => '1',
             'descripcion' => 'programador',
             'rol' => '1',
        ])->assertRedirect('empleados');     // cuando se envien los datos redirecciona a la ruta empleados
            
        $this->assertDatabaseHas('employes', [
            'nombre' => 'oscar fiscal',
            'correo' => 'oscar@example.com',
            'sexo' => 'masculino',
            'area' => '1',
            'descripcion' => 'programador',
            'rol' => '1',
        ]);    // verifica que el empleado se haya creado en la base de datos  
    
    }
 
}
