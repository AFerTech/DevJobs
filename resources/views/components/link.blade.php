@php
    $clases= "text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
@endphp

    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    <a {{$attributes->merge(['class' => $clases])}} >
        {{ $slot }}
    </a>
