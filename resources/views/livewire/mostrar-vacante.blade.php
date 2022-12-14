<div class="p-10">
    {{-- The Master doesn't talk, he acts. --}}
    <div class="mb-5 md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
        {{-- <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{$vacante->empresa}}
        </h3> --}}
       <p class="font-bold text-sm uppercase text-gray-800 my-3">
        Empresa:
       <span class="normal-case font-normal">{{$vacante->empresa}}</span>
       </p>

       <p class="font-bold text-sm uppercase text-gray-800 my-3">
        Último día para postular:
       <span class="normal-case font-normal">{{$vacante->fecha_postulacion->toFormattedDateString()}}</span>
       </p>

       <p class="font-bold text-sm uppercase text-gray-800 my-3">
        Categoria:
       <span class="normal-case font-normal">{{$vacante->categoria->categoria}}</span>
       </p>

       <p class="font-bold text-sm uppercase text-gray-800 my-3">
        Salario:
       <span class="normal-case font-normal">{{$vacante->salario->salario}}</span>
       </p>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        {{-- IMG --}}
        <div class="md:col-span-2">
            <img src="{{asset('storage/vacantes/' .$vacante->img)}}" alt="{{'Imagen de la vacante'.$vacante->titulo}}">
        </div>
        {{-- Descripcion --}}
        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">Descripción</h2>
            <p class="font-bold text-sm  text-gray-800 my-3">{{$vacante->descripcion}}</p>
        </div>
    </div>

    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>¿Deseas aplicar a la vacante?</p>
            <a href="{{route('login')}}" class="font-bold text-indigo-600">Inicia sesión para poder aplicar a la vacante</a>
        </div>
    @endguest

</div>
