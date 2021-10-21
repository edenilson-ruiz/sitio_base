<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Centro;

class Centros extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nombre, $codigo, $codcent, $direccion;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.centros.view', [
            'centros' => Centro::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
						->orWhere('codigo', 'LIKE', $keyWord)
						->orWhere('codcent', 'LIKE', $keyWord)
						->orWhere('direccion', 'LIKE', $keyWord)
						->paginate(10),
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
		$this->codigo = null;
		$this->codcent = null;
		$this->direccion = null;
    }

    public function store()
    {
        $this->validate([
		'nombre' => 'required',
		'codigo' => 'required',
		'codcent' => 'numeric',
        ]);

        Centro::create([
			'nombre' => $this-> nombre,
			'codigo' => $this-> codigo,
			'codcent' => $this-> codcent,
			'direccion' => $this-> direccion
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Centro Successfully created.');
    }

    public function edit($id)
    {
        $record = Centro::findOrFail($id);

        $this->selected_id = $id;
		$this->nombre = $record-> nombre;
		$this->codigo = $record-> codigo;
		$this->codcent = $record-> codcent;
		$this->direccion = $record-> direccion;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
		'codigo' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Centro::find($this->selected_id);
            $record->update([
			'nombre' => $this-> nombre,
			'codigo' => $this-> codigo,
			'codcent' => $this-> codcent,
			'direccion' => $this-> direccion
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Centro Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Centro::where('id', $id);
            $record->delete();
        }
    }
}
