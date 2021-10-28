<?php

namespace App\Http\Livewire;

use App\Models\Centro;
use Livewire\Component;
use App\Models\Empleado;
use App\Models\AreaAtencion;
use App\Models\Cargo;
use App\Models\Profesion;
use Livewire\WithPagination;

class Empleados extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $correo;
    public $updateMode = false;
    //public $areasAtencion = [];
    public $areas = null;
    public $areasAtencion = null;
    public $centroAtencion = null;
    public $cargos = null;
    public $cargo = null;
    public $profesiones = null;
    public $profesion = null;


    public function mount()
    {
        $this->centros = Centro::all();
        $this->profesiones = Profesion::all();
        $this->cargos = Cargo::all();
        $this->centroAtencion = null;
        $this->areasAtencion = null;
        $this->areas = null;
    }

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.empleados.view', [
            'empleados' => Empleado::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('correo', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }

    public function updatedCentroAtencion($centro_id)
    {
        $centro = Centro::find($centro_id);
        //$this->areasAtencion = $centro->areas_atencion()->pluck('area_atencion_id');
        $this->areas = $centro->areas_atencion()->get();
        //dd($this->areasAtencion);

    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->nombre = null;
		$this->correo = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'correo' => 'required',
        ]);

        Empleado::create([
			'nombre' => $this-> nombre,
			'correo' => $this-> correo
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Empleado Successfully created.');
    }

    public function edit($id)
    {
        $record = Empleado::findOrFail($id);

        $this->selected_id = $id;
		$this->nombre = $record-> nombre;
		$this->correo = $record-> correo;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'correo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Empleado::find($this->selected_id);
            $record->update([
			'nombre' => $this-> nombre,
			'correo' => $this-> correo
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Empleado Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Empleado::where('id', $id);
            $record->delete();
        }
    }
}
