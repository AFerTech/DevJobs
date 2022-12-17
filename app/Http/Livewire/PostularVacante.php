<?php

namespace App\Http\Livewire;

use Livewire\Component;
// Habilitar la carga de archivos
use Livewire\WithFileUploads;
class PostularVacante extends Component
{
    use WithFileUploads;

    public $cv;


    protected $rules =[
        'cv' => 'required|mimes:pdf'
    ];


    public function postularme()
    {
         // si pasa la validacion de $rules, se asigna a datos
         $datos = $this->validate();

         // Almacenar el cv
         $cv=$this->cv->store('public/cv');
         $datos['cv'] = str_replace('public/cv/', '',$cv);
        // Crear la postulacion
        // Vacante::create([
        //     'user_id' => auth()->user()->id,
        //     ]);
        // Crear notificacion y enviar email

        // Mostrar msj de ok
    }
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
