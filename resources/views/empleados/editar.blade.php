<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear empleados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
            <form action="{{ route('empleados.update',$empleado->id) }}" method="POST" enctype="multipart/form-data"> 
                @csrf
                @method('PUT')
                <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Nombre completo*</label>
                      <div class="col-sm-10">
                        <input name="nombre"  value="{{ $empleado->nombre }}" type="text" class="form-control py-2 px-3 rounded-lg border-2 ">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label  class="col-sm-2 col-form-label">Correo*</label>
                      <div class="col-sm-10">
                        <input name="correo" value="{{ $empleado->correo }}" type="email" class="form-control py-2 px-3 rounded-lg border-2 " id="inputEmail3">
                      </div>
                    </div>
                    <fieldset class="row mb-3">
                      <legend class="col-form-label col-sm-2 pt-0">Sexo</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" id="gridRadios1" value="masculino">
                            <label class="form-check-label" for="gridRadios1">
                                Masculino
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" id="gridRadios2" value="femenino">
                            <label class="form-check-label">
                                Femenino
                            </label>
                            </div>
                    </fieldset>
                    <!-- select para area -->
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Area*</label>
                      <div class="col-sm-10">
                        <select name="area_id" class="form-control py-2 px-3 rounded-lg border-2">
                          <option selected>Seleccione una area</option>
                          @foreach ($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <!-- text area  para descripcion--> 
                    <div class="row mb-3">
                      <label  class="col-sm-2 col-form-label">Descripcion*</label>
                      <div class="col-sm-10">
                        <textarea name="descripcion" class="form-control py-2 px-3 rounded-lg border-2" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                    </div>
                    <!--- checkbox -->
                    <div class="row mb-3">
                      <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <div class="form-check">
                            <input name="boletin" class="form-check-input" type="checkbox"  value="1" >
                            <label class="form-check-label" >
                                Deseo recibir boletin informativo
                            </label>
                        </div>
                      </div>
                    </div>
                    <!--- checkbox de roles y capturar datos-->
                    
                     
                    <div class="row mb-3">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Roles*</label>
                      <div class="col-sm-10">
                        @foreach ($roles as $role)
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="rol_id[]" value="{{ $role->id }}">
                            <label class="form-check-label" for="gridCheck1">
                                {{ $role->nombre }}
                            </label>
                          </div>
                        @endforeach
                      </div>
                    </div>

                   <!-- botton -->
                    <div class="row mb-3">
                      <div class="col-sm-10">
                        <button type="submit" class="bg-indigo-600 px-12 py-2 rounded text-gray-200 font-semibold hover:bg-indigo-800 transition duration-200 each-in-out">Guardar</button>
                      </div>
                    </div>
                  </form>

           
        </div>
    </div>
</x-app-layout>