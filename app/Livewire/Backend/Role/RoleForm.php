<?php

namespace App\Livewire\Backend\Role;

use App\Models\Role;
use Livewire\Component;

class RoleForm extends Component
{
    public ?Role $role;
    public $action;
    public $type;
    public $form = [];

    public function mount($role = null, $type = '', $action = '')
    {
        $this->action = $action ?? 'store';
        $this->type = $type ?? 'Submit';

        if ($role) {
            $this->role = $role;
            $this->initForm($role);
        }
    }

    public function initForm($role = null)
    {
        $this->form['id'] = $role && $role->id ? $role->id : '';
        $this->form['name'] = $role && $role->name ? $role->name : '';
    }

    public function store()
    {
        $this->validate([
            'form.name' => ['required', 'string', 'max:255', 'unique:roles,name']
        ], [], [
            'form.name' => __('Nama Role')
        ]);

        Role::query()->create($this->form);

        session()->flash('success', __('Role baru berhasil ditambahkan'));

        $this->redirect(route('roles.index'));
    }

    public function update()
    {
        $this->validate([
            'form.name' => ['required', 'string', 'max:255', 'unique:roles,name,' . $this->form['id']]
        ], [], [
            'form.name' => __('Nama Role')
        ]);

        $this->role->update($this->form);

        session()->flash('success', __('Role berhasil diperbarui'));

        $this->redirect(route('roles.index'));
    }

    public function render()
    {
        return view('livewire.backend.role.role-form');
    }
}
