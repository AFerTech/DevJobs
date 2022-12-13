<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $fecha_postulacion;
    public $descripcion;
    public $img;
    public $newImg;

    use WithFileUploads;

    protected $rules =[
        'titulo' => 'required|string',
        'empresa' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'fecha_postulacion' => 'required',
        'descripcion' => 'required',
        'newImg' => 'nullable|image|max:1024',

    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->fecha_postulacion =Carbon::parse($vacante->fecha_postulacion)->format('Y-m-d');
        $this->descripcion = $vacante->descripcion;
        $this->img = $vacante->img;
    }


    public function editarVacante()
    {
        $datos= $this->validate();

        // revisar si hay una nueva img
        if($this->newImg){
            $img = $this->newImg->store('public/vacantes');
            $datos['imagen'] =str_replace('public/vacantes/', '', $img);
        }
        // encontrar la vacante a editar
        $vacante = Vacante::find($this->vacante_id);

        // asignar los valores
        $vacante->titulo = $datos['titulo'];
        $vacante->empresa = $datos['empresa'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->fecha_postulacion = $datos['fecha_postulacion'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->img = $datos['imagen']  ?? $vacante->img;

        // guardar la vacante
        $vacante->save();
        // redireccionar
        session()->flash('mensaje', 'Vacante actualizada correctamente');
        return redirect()->route('vacantes.index');
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
