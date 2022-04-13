<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      
            <div class="table-responsive-sm table-responsive-md">
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
                        <td scope="row">{{$employe->area}}</td>
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
                    {!! $employes->links() !!}
              </table>
              
            </div>
        </div>
    </div>
</x-app-layout>
