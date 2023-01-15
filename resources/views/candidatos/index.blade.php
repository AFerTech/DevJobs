<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-4xl font-bold text-center nb-10">Candidatos:
                        {{$vacante->titulo}}</h1>
                    <div class="md:flex md:justify-center p-5">
                        <ul class="divide-y divide-gray-200 w-full" >
                            @forelse ($vacante->candidatos as $candidato )
                                <li class="p-3 flex items-center">
                                    <div class="flex-1">
                                        <p class="text-xl font-medium text-gray-800">{{$candidato->user->name}}</p>
                                        <p class="text-sm font-medium text-gray-600">{{$candidato->user->email}} </p>
                                        <p class="text-sm font-medium text-gray-600">
                                            Día postulado: <span class="font-normal">{{$candidato->created_at->diffForHumans()}} </span>
                                        </p>

                                    </div>

                                    <div>
                                        <a href="{{asset('storage/cv/'.$candidato->cv)}}"
                                        class="inline-flex items-center shadow-sm px-2.5 py-0.5 border-gray-400 text-sm
                                        leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-100"
                                        target="_blank"
                                        rel="noreferrer noopener">Ver CV</a>
                                    </div>
                                </li>
                            @empty
                                <p class="p-3 text-center text-sm text-gray-600">No hay candidatos postulados a la vacante</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
