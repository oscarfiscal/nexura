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
                    <th scope="col">Rol</th>
                    
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
                        <td scope="row">{{$employe->rol}}</td>
                    </tr>
                    @endforeach
                </tbody>
                   
              </table>
              {!! $employes->links() !!}
            </div>
        </div>
    </div>
</x-app-layout>
