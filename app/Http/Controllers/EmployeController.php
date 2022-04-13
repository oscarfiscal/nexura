<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Area;
use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //consultar areas
        $areas = Area::all();

        //consultar roles
        $roles = Rol::all();

       return view('empleados.crear', compact('areas','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      /*   dd($request->all()); */
      $request->validate([
            'nombre' => 'required',
            'correo' => 'required',
            'sexo' => 'required',
            'area_id' => 'required',
            'descripcion' => 'required',
            'boletin' => 'required',
        ]);

        $employe = $request->only(['nombre','correo','sexo','area_id','descripcion','boletin']);

            $employe = Employe::create($employe);

            if($roles = $request->rol_id)
            {
                $roles = $roles;
                foreach ($roles as $rol) {

                    $employe->roles()->attach(['rol_id'=>$rol,
                    ]);

                            }
            }

           
        return redirect('dashboard');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit(Employe $empleado)
    {
        //consultar areas
        $areas = Area::all();

        //consultar roles
        $roles = Rol::all();

        return view('empleados.editar', compact('empleado','areas','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employe $empleado)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required',
            'sexo' => 'required',
            'area_id' => 'required',
            'descripcion' => 'required',
            'boletin' => 'required',
        ]);

        $empleado->update($request->only(['nombre','correo','sexo','area_id','descripcion','boletin']));
        

        $empleado->roles()->detach();

        if($roles = $request->rol_id)
        {
            $roles = $roles;
            foreach ($roles as $rol) {

                $empleado->roles()->attach(['rol_id'=>$rol,
                ]);

                        }
        }

        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $empleado)
    {
        
        $empleado->delete();
        return redirect()->route('dashboard');
    }
}
