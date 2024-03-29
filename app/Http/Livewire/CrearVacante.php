<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
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

        // almacenar la img
        $imagen=$this->img->store('public/vacantes');
        $datos['img'] = str_replace('public/vacantes/', '',$imagen);

        // crear vacante
        Vacante::create([
        'titulo' => $datos['titulo'],
        'empresa' => $datos['empresa'],
        'salario_id' => $datos['salario'],
        'categoria_id' => $datos['categoria'],
        'fecha_postulacion' => $datos['fecha_postulacion'],
        'img' => $datos['img'],
        'descripcion' => $datos['descripcion'],
        'user_id' => auth()->user()->id,
        ]);
        // crear msj

        session()->flash('mensaje', 'Vacante Creada Correctamente');

        // redireccionar a vacantes

        return redirect()->route('vacantes.index');
    }
}
