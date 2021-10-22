<?php

namespace App\Http\Livewire;


use DB;
use Hash;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Arr;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Users extends Component
{
    use WithPagination;
    use AuthorizesRequests;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $email, $password, $confirmPassword;
    public $updateMode = false;
    public $rolesUsuario = [];


    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.users.view', [
            'users' => User::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->paginate(10),
            'roles' => Role::all(),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->name = null;
		$this->email = null;
		$this->password = null;
		$this->confirmPassword = null;
        $this->rolesUsuario = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'email' => 'required|email|unique:users,email',
        'password' => 'required|same:confirmPassword',
        'rolesUsuario' => 'required',
        ]);

        $user = User::create([
			'name' => $this-> name,
			'email' => $this-> email,
            'password' => Hash::make($this-> password),
        ]);

        $user->assignRole($this->rolesUsuario);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'User Successfully created.');
    }

    public function edit($id)
    {
        $record = User::findOrFail($id);

        $this->selected_id = $id;
		$this->name = $record-> name;
		$this->email = $record-> email;

        $this->rolesUsuario = $record->roles->pluck('id');

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->selected_id,
            'password' => 'same:confirmPassword',
            'rolesUsuario' => 'required',
        ]);

        if ($this->selected_id) {
			$record = User::find($this->selected_id);
            if(!empty($this->password)){
                $this->password = Hash::make($this->password);
            }else{
                $record = Arr::except($record,array('password'));
                //dd($record);
            }
            $record->update([
			'name' => $this-> name,
			'email' => $this-> email,
            ]);

            DB::table('model_has_roles')->where('model_id',$this->selected_id)->delete();
            $record->assignRole($this->rolesUsuario);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'User Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = User::where('id', $id);
            $record->delete();
        }
    }
}
