<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

        $response = $this->post('/empleados', [
            'nombre' => 'oscar fiscal',
             'correo' => 'oscar@example.com',
             'sexo' => 'masculino',
             'area' => '1',
             'descripcion' => 'programador',
             'boletin' => '1',
             'rol' => '1',
        ])->assertRedirect('dashboard');     // cuando se envien los datos redirecciona a la ruta empleados
            
        $this->assertDatabaseHas('employes', [
            'nombre' => 'oscar fiscal',
            'correo' => 'oscar@example.com',
            'sexo' => 'masculino',
            'area' => '1',
            'descripcion' => 'programador',
            'boletin' => '1',
            'rol' => '1',
        ]);    // verifica que el empleado se haya creado en la base de datos  
    
    }
 
}
