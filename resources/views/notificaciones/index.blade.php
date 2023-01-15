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
                    <h1 class="text-4xl font-bold text-center nb-10">Notificaciones</h1>

                    @forelse ($notificaciones as $notificacion )
                        <div class="p-5 border border-gray-200 lg:flex justify-between lg:items-center">
                            <div>
                                <p>Tienes un nuevo candidato en:
                                    <span class="font-bold">{{$notificacion->data['nombre_vacante']}}</span>
                                </p>
                                <p>
                                    <span class="font-bold">{{$notificacion->created_at->diffForHumans()}}</span>
                                </p>
                            </div>
                            <div class="mt-5 lg:mt-0 ">
                                <a href="{{route ('candidatos.index', $notificacion->data['id_vacante'])}}" class="bg-indigo-500 p-3 text-sm uppercase font-bold text-white rounded-lg">Ver Candidatos</a>
                            </div>
                        </div>
                    @empty
                        <p class="uppercase border border-gray-600 bg-gray-100 text-gray-600 font-bold p-2 my-5 text-sm"> No hay notificaciones por mostrar</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
