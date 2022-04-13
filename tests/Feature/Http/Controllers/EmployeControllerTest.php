<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\Area;
use App\Models\User;
use App\Models\Employe;
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
    public function test_list_employes()

    {
        $this->withoutExceptionHandling();
        
        $user = User::factory()->create(); //crea un usuario
        $this->actingAs($user); //autentica el usuario

        Employe::factory()->create(); // crea un empleado
                   
        $response=$this->get('dashboard')->assertStatus(200); //obtiene la ruta clientes y verifica que el status sea 200
        $employe=Employe::all();  //obtiene todos los empleados 
        $response->assertOk();  //cuando obtenga los empleados verifica que el estado sea 200
    }
    
    public function test_create_employe()
    {
        $this->withoutExceptionHandling(); 

        $user = User::factory()->create(); //crea un usuario
        $this->actingAs($user); //autentica el usuario

        $response = $this->post('/empleados', [
            'nombre' => 'oscar fiscal',
             'correo' => 'oscar@example.com',
             'sexo' => 'masculino',
             'area_id' => Area::factory()->create()->id,
             'descripcion' => 'programador',
             'boletin' => '1',
             'rol' => '1',
        ])->assertRedirect('dashboard');     // cuando se envien los datos redirecciona a la ruta empleados
            
        $this->assertDatabaseHas('employes', [
            'nombre' => 'oscar fiscal',
            'correo' => 'oscar@example.com',
            'sexo' => 'masculino',
            'area_id' => 1,
            'descripcion' => 'programador',
            'boletin' => '1',
            'rol' => '1',
        ]);    // verifica que el empleado se haya creado en la base de datos  
    
    }
 
}
