<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Illuminate\Support\Carbon;

class EditarVacante extends Component
{
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $fecha_postulacion;
    public $descripcion;
    public $img;


    public function mount(Vacante $vacante)
    {

        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->fecha_postulacion =Carbon::parse($vacante->fecha_postulacion)->format('Y-m-d');
        $this->descripcion = $vacante->descripcion;
        $this->img = $vacante->img;




    }
    public function render()
    {

        $salarios =Salario::all();
        $categorias =Categoria::all();
        return view('livewire.editar-vacante', [
            'salarios' => $salarios,
            'categorias' =>$categorias,
        ]);
    }

}
