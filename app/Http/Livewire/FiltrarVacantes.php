<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use Livewire\Component;
use App\Models\Categoria;

class FiltrarVacantes extends Component
{
    public  $termino;
    public  $categoria;
    public  $salario;

    public function filtrar()
    {
        $this->emit('filtrado',$this->termino, $this->categoria, $this->salario);
    }
    public function render()
    {
        // consultar
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.filtrar-vacantes',[
            'salarios' => $salarios,
            'categorias' => $categorias,
        ]);
    }
}
