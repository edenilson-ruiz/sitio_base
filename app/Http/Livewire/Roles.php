<?php

namespace App\Http\Livewire;

use DB;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Roles extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name;
    public $updateMode = false;

    public $userPermissions= [];

    public function render()
    {
        $keyWord = '%'.$this->keyWord .'%';
        return view('livewire.roles.view', [
            'roles' => Role::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->paginate(10),
            'permissions' => Permission::all(),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    public function resetInput()
    {
        $this->name = null;
        $this->userPermissions = [];
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|unique:roles,name',
            'userPermissions' => 'required',
        ]);

        $role = Role::create([
            'name' => $this->name
        ]);

        $role->syncPermissions($this->userPermissions);

        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'El rol fué creado con éxito.');

    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")
            ->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id');


        $this->selected_id = $id;
		$this->name = $role-> name;
		$this->userPermissions = $rolePermissions;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'userPermissions' => 'required',
        ]);

        if ($this->selected_id) {
            $role = Role::find($this->selected_id);
            $role->name = $this->name;
            $role->save();

            $role->syncPermissions($this->userPermissions);

            $this->resetInput();
            $this->updateMode = false;
            session()->flash('message', 'El rol fué actualizado correctamente.');
        }
    }

    public function destroy($id)
    {
        if($id) {
            DB::table("roles")->where('id',$id)->delete();
            session()->flash('message', 'El rol fué borrado correctamente.');
        }
    }
}
