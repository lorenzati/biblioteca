<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use Livewire\Component;
use Livewire\WithPagination;

class libroController extends Component
{
    use WithPagination;

    private $libros;
    public $titulo, $descripcion, $cantidad_paginas, $editorial, $autor, $fecha_publicacion,  $activa, $libro_id;
    public $buscar = '', $orden = 'asc', $campo = 'libros.id', $simbolo = 'up', $cantPag = 5 ;
    public $isModalOpen = 0;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function search()
    {        
        $this->libros = Libro::where('libros.id', 'like', '%'.$this->buscar.'%')
        ->orwhere('libros.titulo', 'like', '%'.$this->buscar.'%')
        ->orwhere('libros.descripcion', 'like', '%'.$this->buscar.'%')
        ->orwhere('libros.cantidad_paginas', 'like', '%'.$this->buscar.'%')
        ->orwhere('libros.autor', 'like', '%'.$this->buscar.'%')
        ->orwhere('libros.editorial', 'like', '%'.$this->buscar.'%')
        ->orwhere('libros.fecha_publicacion', 'like', '%'.$this->buscar.'%')
        ->orderBy($this->campo,$this->orden)
        ->paginate($this->cantPag);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function sortBy($campo)
    {
        if($this->campo === $campo){
            $this->orden = ($this->orden === 'asc')?'desc':'asc';
        }else{
            $this->orden = 'asc';
        }

        $this->simbolo = ($this->orden === 'asc')?'up':'down';
        $this->campo = $campo;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        if($this->buscar!=""){
            $this->search();
            return view('livewire.libro.index', [
                'libros' => $this->libros
            ]);
        }else{
            return view('livewire.libro.index', [
                'libros' => Libro::orderBy($this->campo,$this->orden)->paginate($this->cantPag)
            ]);
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetCreateForm()
    {        
        $this->titulo = '';        
        $this->descripcion = ''; 
        $this->cantidad_paginas = ''; 
        $this->autor = ''; 
        $this->editorial = ''; 
        $this->fecha_publicacion = ''; 
        $this->activa = 1;        
        $this->clearFilters();
    }

    public function clearFilters()
    {
        $this->buscar = '';
        $this->orden = 'asc';
        $this->campo = 'libros.id';
        $this->simbolo = 'up';
        $this->cantPag = 5;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'titulo' => 'required',           
            'descripcion' => 'required',           
            'cantidad_paginas' => 'required',           
            'autor' => 'required',           
            'editorial' => 'required',           
            'fecha_publicacion' => 'required',                       
        ]);

        Libro::updateOrCreate(['id' => $this->libro_id], [
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'cantidad_paginas' => $this->cantidad_paginas,
            'autor' => $this->autor,
            'editorial' => $this->editorial,
            'fecha_publicacion' => $this->fecha_publicacion,
            'activa' => $this->activa,            
        ]);
        
        session()->flash('message',
            $this->libro_id ? 'Libro actualizado con éxito.' : 'Libro creado con éxito.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        $this->libro_id = $id;
        $this->titulo = $libro->titulo;        
        $this->descripcion = $libro->descripcion;        
        $this->cantidad_paginas = $libro->cantidad_paginas;        
        $this->autor = $libro->autor;        
        $this->editorial = $libro->editorial;        
        $this->fecha_publicacion = $libro->fecha_publicacion;        
        $this->activa = $libro->activa;        

        $this->openModalPopover();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        $libro = Libro::find($id);
        $libro->deleted_at = date('Y-m-d H:i:s');
        $libro->save();        
        session()->flash('message', 'Libro eliminado con éxito.');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function restaurar($id)
    {
        $libro = Libro::find($id);
        $libro->deleted_at = null;
        $libro->save();        
        session()->flash('message', 'Libro restaurado con éxito.');
    }
}
