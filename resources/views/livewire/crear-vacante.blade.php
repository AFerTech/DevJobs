<form action="" class="space-y-5 md:w-1/2" novalidate wire:submit.prevent='crearVacante'>
    {{-- Nombre Vacante --}}
    <div class="mt-4">
        <x-input-label for="titulo" :value="__('Vacante')" />

        <x-text-input
        class="block w-full mt-1"
        id="titulo"
        type="text"
        wire:model="titulo"
        :value="old('titulo')"
        placeholder="Nombre de la Vacante"
        />
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>
    {{-- Empresa --}}
    <div class="mt-4">
        <x-input-label for="empresa" :value="__('Empresa')" />

        <x-text-input
        class="block w-full mt-1"
        id="empresa"
        type="text"
        wire:model="empresa"
        :value="old('empresa')"
        placeholder="Nombre de la empresa Ej. Netflix, Bancomer, Coppel, Didi"
        />
        <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
    </div>
    {{-- Salario --}}
    <div class="mt-4">
        <x-input-label for="salario" :value="__('Salario Mensual')" />

        <select
        wire:model="salario"
        id="salario"
        class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50">

        <option>--Seleccionar Salario--</option>
        @foreach ($salarios as $salario )
        <option value="{{$salario-> id }}"> {{$salario->salario}}</option>
        @endforeach
        </select>

        <x-input-error :messages="$errors->get('salario')" class="mt-2" />
    </div>
    {{-- Categoria --}}
    <div class="mt-4">
        <x-input-label for="categoria" :value="__('Categoria')" />

        <select
        wire:model="categoria"
        id="categoria"
        class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50">

        <option >--Seleccionar Categoria</option>
        @foreach ($categorias as $categoria )
        <option value="{{$categoria->id}}"> {{$categoria->categoria}}</option>
        @endforeach
        </select>

        <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
    </div>
    {{-- Fecha Postulaciòn --}}
    <div class="mt-4">
        <x-input-label for="fecha_postulacion" :value="__('Fecha limite ')" />

        <x-text-input
        class="block w-full mt-1"
        id="fecha_postulacion"
        type="date"
        wire:model="fecha_postulacion"
        :value="old('fecha_postulacion')"
        />
        <x-input-error :messages="$errors->get('fecha_postulacion')" class="mt-2" />
    </div>
    {{-- IMG --}}
    <div class="mt-4">
        <x-input-label for="img" :value="__('Imagen ')" />

        <x-text-input
        class="block w-full mt-1"
        id="img"
        type="file"
        wire:model="img"
        />
    </div>
    {{-- Descripciòn --}}
    <div class="mt-4">
        <x-input-label for="descripcion" :value="__('Descripciòn de la vacante ')" />

        <textarea
        class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50"
        wire:model="descripcion"
        id="descripcion"
        placeholder="Descripciòn de la vacante"
        cols="30"
        rows="10">
        </textarea>
        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
    </div>

    <x-primary-button class="justify-center w-full">
        {{ __('Publicar Vacante') }}
    </x-primary-button>

</form>
