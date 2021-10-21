<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Genero;

class Generos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $genero_id, $nombre;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.generos.view', [
            'generos' => Genero::latest()
						->orWhere('nombre', 'LIKE', $keyWord)
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
		$this->genero_id = null;
        $this->nombre = null;
    }

    public function store()
    {
        $this->validate([
        'genero_id' => 'required',
		'nombre' => 'required',
        ]);

        Genero::create([
            'id' => strtoupper($this->genero_id),
			'nombre' => strtoupper($this-> nombre)
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Genero fué creado satisfactoriamente.');
    }

    public function edit($id)
    {
        $record = Genero::findOrFail($id);

        $this->selected_id = $id;
		$this->nombre = $record-> nombre;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nombre' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Genero::find($this->selected_id);
            $record->update([
			'nombre' => strtoupper($this-> nombre)
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Genero fué actualizado satisfactoriamente.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Genero::where('id', $id);
            $record->delete();
        }
    }
}
