<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
// Habilitar la carga de archivos
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;

    public $cv;
    public $vacante;


    protected $rules =[
        'cv' => 'required|mimes:pdf'
    ];

    public function mount (Vacante $vacante)
    {
        $this->vacante->$vacante;
    }
    public function postularme()
    {
         // si pasa la validacion de $rules, se asigna a datos
         $datos = $this->validate();

         // Almacenar el cv
         $cv=$this->cv->store('public/cv');
         $datos['cv'] = str_replace('public/cv/', '',$cv);
        // Crear la postulacion
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv']
        ]);
        // Crear notificacion y enviar email

        // Mostrar msj de ok
        session()->flash('mensaje', 'se envió correctamente tu información');

        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
