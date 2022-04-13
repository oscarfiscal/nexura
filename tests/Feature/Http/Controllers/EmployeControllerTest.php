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

        Employe::factory()->create([
            'nombre' => 'Juan',
            'correo' => 'juan@example.com',
            'sexo' => 'masculino',
            'area_id' => Area::factory()->create()->id,
            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, quos, quisquam.',
            'boletin' => '1',

        ]); // crea un empleado
                   
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
        ])->assertRedirect('dashboard');     // cuando se envien los datos redirecciona a la ruta empleados
            
        $this->assertDatabaseHas('employes', [
            'nombre' => 'oscar fiscal',
            'correo' => 'oscar@example.com',
            'sexo' => 'masculino',
            'area_id' => 1,
            'descripcion' => 'programador',
            'boletin' => '1',
        ]);    // verifica que el empleado se haya creado en la base de datos  
    
    }

    public function test_edit_employe()
    {
        $this->withoutExceptionHandling(); 

        $user = User::factory()->create(); //crea un usuario
        $this->actingAs($user); //autentica el usuario

        $employe = Employe::factory()->create(
            [
                'nombre' => 'oscar fiscal',
                'correo' => 'os@example.com',
                'sexo' => 'masculino',
                'area_id' => Area::factory()->create()->id,
                'descripcion' => 'programador',
                'boletin' => '1',
            ]
        ); //crea un employe

        $response = $this->get('/empleados/'.$employe->id.'/edit')->assertOk(); //obtiene la ruta empleados/id/edit y verifica que el status sea 200
        $response->assertViewIs('empleados.editar'); //verifica que la vista sea empleados.editar
        $response->assertViewHas('empleado'); //verifica que la vista tenga el employe
    }

    public function test_delete_employe()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create(); //crea un usuario
        $this->actingAs($user); //autentica el usuario

        $employe = Employe::factory()->create([
            'nombre' => 'oscar fiscal',
            'correo' => 'os@example.com',
            'sexo' => 'masculino',
            'area_id' => Area::factory()->create()->id,
            'descripcion' => 'programador',
            'boletin' => '1',
        ]); //crea un empleado

        $response = $this->delete('/empleados/'.$employe->id)->assertRedirect('dashboard'); //elimina el emp

        $this->assertDatabaseMissing('employes', [
            'id' => $employe->id,
        ]); //verifica que el emp no exista en la base de datos
    }
 
}
