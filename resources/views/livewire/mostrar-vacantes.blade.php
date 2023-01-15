<div>
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

        @forelse ($vacantes as $vacante )

        <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
            <div class="leading-10">
                <a href="{{route ('vacantes.show', $vacante->id)}}" class="text-xl font-bold">
                    {{$vacante->titulo}}
                </a>
                <p class="text-sm text-gray-600 font-bold">
                    {{$vacante->empresa}}
                </p>
                <p class="text-sm text-gray-500 font-normal">
                    Último día para postular: {{ $vacante->fecha_postulacion->format('d/m/Y') }}
                </p>
            </div>

            <div class="flex flex-col md:flex-row gap-3 items-stretch mt-5 md:mt-0">
                <a href="{{route ('candidatos.index', $vacante)}}" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold
                uppercase text-center">
                {{$vacante->candidatos->count()}}
                Candidatos
                </a>

                <a href="{{route('vacantes.edit',[$vacante->id])}}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold
                uppercase text-center">
                Editar
                </a>

                <button
                 wire:click="$emit('mostrarAlert', {{$vacante->id}})"
                 class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold
                uppercase text-center">
                Eliminar
                </button>
            </div>
        </div>

        @empty

        <p class="p-3 text-center text-sm text-gray-600"> No hay vacantes por mostrar</p>

        @endforelse
    </div>

    <div class=" mt-10">
        {{$vacantes->links()}}
    </div>
</div>


@push('scripts')
    <script>
        Livewire.on('mostrarAlert', vacanteId =>{

            Swal.fire({
                title: '¿Seguro que desea eliminar la vacante?',
                text: "Las vacantes eliminadas no se pueden recuperar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Si, Eliminar!',
                cancelButtonText: 'Cancelar',
                }).then((result) => {
                if (result.isConfirmed) {
                    // eliminar la vacante
                    Livewire.emit('eliminarVacante', vacanteId)
                    Swal.fire(
                    '¡Eliminado!',
                    'La vacante ha sido eliminada',
                    'Eliminado Correctamente'
                    )
                }
                })
        })
    </script>
@endpush
