<div class="bg-gray-100 p-5 nt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postular a la vacante</h3>


    <form action="" class="w-96 mt-5" wire:submit.prevent='postularme'>
        <div class="mb-4">
            <x-input-label for="cv" :value="__('Curriculum')" />
            <x-text-input id="cv" type="file" wire:model="cv" accept=".pdf" class="block mt-1 w-full"/>

            <x-input-error :messages="$errors->get('cv')" class="mt-2" />

        </div>

        <x-primary-button class="my-5">
            {{ __('Postular') }}
        </x-primary-button>
    </form>
</div>
