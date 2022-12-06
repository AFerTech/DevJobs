<form action="" class="md:w-1/2" novalidate>
    {{-- Nombre Vacante --}}
    <div class="mt-4">
        <x-input-label for="titulo" :value="__('Vacante')" />

        <x-text-input
        class="block w-full mt-1"
        id="titulo"
        type="text"
        name="titulo"
        :value="old('titulo')"
        placeholder="Nombre de la Vacante"
        />
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>
    {{-- Salario --}}
    <div class="mt-4">
        <x-input-label for="salario" :value="__('Salario')" />

        <x-text-input
        class="block w-full mt-1"
        id="salario"
        type="number"
        name="salario"
        :value="old('salario')"
        />
        <x-input-error :messages="$errors->get('salario')" class="mt-2" />
    </div>
</form>
