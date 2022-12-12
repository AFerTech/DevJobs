<div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

    @foreach ($vacantes as $vacante )

    <div class="p-6 text-gray-900">
        <div class="leading-10">
            <a href="#" class="text-xl font-bold">
                {{$vacante->titulo}}
            </a>
        </div>
    </div>

    @endforeach
</div>
