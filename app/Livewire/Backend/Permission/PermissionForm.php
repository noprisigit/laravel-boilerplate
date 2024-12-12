<?php

namespace App\Livewire\Backend\Permission;

use App\Models\Permission;
use Livewire\Attributes\On;
use Livewire\Component;

class PermissionForm extends Component
{
    public ?Permission $permission;

    public $action;
    public $type;

    public $modal = [];
    public $form = [];

    public function mount()
    {
        $this->modal['title'] = '';
        $this->form['name'] = '';
    }

    #[On('permission:create')]
    public function create()
    {
        $this->modal['title'] = __('Tambah Permission');
        $this->form['name'] = '';
        $this->action = 'store';
        $this->type = __('Submit');
    }

    public function store()
    {
        $this->validate([
            'form.name' => ['required', 'string', 'max:255', 'unique:permissions,name']
        ], [], [
            'form.name' => __('Nama Permission')
        ]);

        Permission::query()->create($this->form);

        $this->dispatch('showToastSuccess', ['message' => __('Permission baru berhasil ditambahkan')]);
        $this->dispatch('refreshDatatable');
        $this->dispatch('closeModal', ['modalId' => 'permissionModal']);
    }

    #[On('permission:edit')]
    public function edit($id)
    {
        $this->modal['title'] = __('Edit Permission');

        $this->permission = Permission::query()->findOrFail($id);
        $this->form['id'] = $this->permission->id;
        $this->form['name'] = $this->permission->name;

        $this->action = 'update';
        $this->type = __('Perbarui');
    }

    public function update()
    {
        $this->validate([
            'form.name' => ['required', 'string', 'max:255', 'unique:permissions,name,' . $this->form['id']]
        ], [], [
            'form.name' => __('Nama Permission')
        ]);

        $this->permission->update($this->form);

        $this->dispatch('showToastSuccess', ['message' => __('Permission berhasil diperbarui')]);
        $this->dispatch('refreshDatatable');
        $this->dispatch('closeModal', ['modalId' => 'permissionModal']);
    }

    public function render()
    {
        return view('livewire.backend.permission.permission-form');
    }
}
