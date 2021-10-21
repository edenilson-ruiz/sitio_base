<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\AreaAtencion;
use App\Models\Centro;

class AreasAtencion extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $descripcion;
    public $updateMode = false;

    public $centrosAtencion = [];

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.areas_atencion.view', [
            'areasAtencion' => AreaAtencion::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->paginate(10),
            'centros' => Centro::all(),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->nombre = null;
		$this->descripcion = null;
        $this->centrosAtencion = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
        'centrosAtencion' => 'required',
        ]);

        $area_atencion = AreaAtencion::create([
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion
        ]);

        $area_atencion->centros()->sync($this->centrosAtencion);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'AreasAtencion Successfully created.');


    }

    public function edit($id)
    {
        $record = AreaAtencion::findOrFail($id);

        $this->selected_id = $id;
		$this->nombre = $record-> nombre;
		$this->descripcion = $record-> descripcion;

        $this->centrosAtencion = $record->centros()->pluck('centros.id');

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = AreaAtencion::find($this->selected_id);
            $record->update([
			'nombre' => $this-> nombre,
			'descripcion' => $this-> descripcion
            ]);

            $record->centros()->sync($this->centrosAtencion);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'AreasAtencion Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = AreaAtencion::where('id', $id);
            $record->delete();
        }
    }
}
