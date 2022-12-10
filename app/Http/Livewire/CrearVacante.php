<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    public $titulo;
    public $empresa;
    public $salario;
    public $categoria;
    public $fecha_postulacion;
    public $img;
    public $descripcion;

    use WithFileUploads;

    protected $rules =[
        'titulo' => 'required|string',
        'empresa' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'fecha_postulacion' => 'required',
        'img' => 'required|image|max:1024',
        'descripcion' => 'required'
    ];


    public function render()
    {
        // consulta la DB de salarios
        $salarios =Salario::all();
        $categorias =Categoria::all();
        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' =>$categorias,
        ]);
    }
    public function crearVacante()
    {
        // si pasa la validacion de $rules, se asigna a datos
        $datos = $this->validate();
    }
}
