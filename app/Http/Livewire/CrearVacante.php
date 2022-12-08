<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

class CrearVacante extends Component
{
    public $titulo;
    public $empresa;
    public $salario;
    public $categoria;
    public $fecha_postulacion;
    public $img;
    public $descripcion;

    protected $rules =[
        'titulo' => 'required|string',
        'empresa' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'fehca_postulacion' => 'required',
        'img' => 'required',
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
}
