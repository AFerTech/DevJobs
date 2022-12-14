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
</div>
