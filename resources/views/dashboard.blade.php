<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="table-responsive-sm table-responsive-md">
                 <a type="button" href="{{ route('empleados.create') }}" style="float: right;" class="bg-indigo-600 px-12 py-2 rounded text-gray-200 font-semibold hover:bg-indigo-800 transition duration-200 each-in-out"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
              </svg></a>
            <table class="table table-dark table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Area</th>
                    <th scope="col">Boletin</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                    
                  </tr>
                </thead>
                <tbody>
                    @foreach ($employes as $employe)
                    <tr>
                        <td scope="row">{{$employe->nombre}}</td>
                        <td scope="row">{{$employe->correo}}</td>
                        <td scope="row">{{$employe->sexo}}</td>
                        <td scope="row">{{$employe->area->nombre}}</td>
                        @if($employe->boletin)
                        <td scope="row">si</td>
                        @endif
                        @if(!$employe->boletin)
                        <td scope="row">no</td>
                         @endif
                        <td scope="row">

                            <a href="{{ route('empleados.edit', $employe->id) }}" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                              </svg></a>

                        </td>
                        <td scope="row">
                          <form action="{{ route('empleados.destroy', $employe->id) }}" method="POST" class="formEliminar">
                            @csrf
                            @method('DELETE')
                            <button type="submit"  style="background-color:red;" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                            </svg></button>
                        </form>
                           
                        </td> 
                    </tr>

                    @endforeach
                </tbody>
                   
              </table>
              {!! $employes->links() !!}
            </div>
        </div>
    </div>
</x-app-layout>
<script>
  (function () {
'use strict'
//debemos crear la clase formEliminar dentro del form del boton borrar
//recordar que cada registro a eliminar esta contenido en un form  
var forms = document.querySelectorAll('.formEliminar')
Array.prototype.slice.call(forms)
  .forEach(function (form) {
    form.addEventListener('submit', function (event) {        
        event.preventDefault()
        event.stopPropagation()        
        Swal.fire({
              title: '¿Confirma la eliminación del registro?',        
              icon: 'info',
              showCancelButton: true,
              confirmButtonColor: '#20c997',
              cancelButtonColor: '#6c757d',
              confirmButtonText: 'Confirmar'
          }).then((result) => {
              if (result.isConfirmed) {
                  this.submit();
                  Swal.fire('¡Eliminado!', 'El registro ha sido eliminado exitosamente.','success');
              }
          })                      
    }, false)
  })
})()
</script>

