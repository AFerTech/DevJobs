<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostularVacante extends Component
{
    public $cv;

    protected $rules =[
        'cv' => 'required|mines:pdf'
    ];


    public function postularme()
    {
        $this-> validate();

        // Almacenar el cv

        // Crear la vacante

        // Crear notificacion y enviar email

        // Mostrar msj de ok
    }
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
