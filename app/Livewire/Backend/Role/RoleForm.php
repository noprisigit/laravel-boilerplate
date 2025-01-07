<?php

namespace App\Livewire\Backend\Role;

use App\Models\Permission;
use App\Models\Role;
use Livewire\Component;

class RoleForm extends Component
{
    public ?Role $role;
    public $action;
    public $type;
    public $form = [];

    public $permissions = [];
    public $selectedPermissions = [];

    public function mount($role = null, $type = '', $action = '')
    {
        $this->action = $action ?? 'store';
        $this->type = $type ?? 'Submit';

        if ($role) {
            $this->role = $role;
            $this->initForm($role);
            $this->selectedPermissions = $role?->permissions->pluck('id')->toArray() ?? [];
        }

        $this->permissions = Permission::query()
            ->select('group_name', 'id', 'name')
            ->orderBy('group_name')
            ->get()
            ->groupBy('group_name')
            ->all();
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

        $role = Role::query()->create($this->form);
        $role->permissions()->sync($this->selectedPermissions);

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
        $this->role->permissions()->sync($this->selectedPermissions);

        session()->flash('success', __('Role berhasil diperbarui'));

        $this->redirect(route('roles.index'));
    }

    public function setSelectedPermission($permission, $group = null)
    {
        if ($permission === 'all-permissions') {
            if ($this->areAllPermissionsSelected()) {
                // Uncheck all permissions
                $this->selectedPermissions = [];
            } else {
                // Select all permissions
                $this->selectedPermissions = collect($this->permissions)
                    ->flatMap(fn($groupPermissions) => $groupPermissions->pluck('id'))
                    ->toArray();
            }
        } elseif ($group !== null && $permission === 'group') {
            // Toggle all permissions within a specific group
            $groupPermissions = $this->permissions[$group]->pluck('id')->toArray();
            if ($this->areGroupPermissionsSelected($groupPermissions)) {
                // Uncheck all permissions in the group
                $this->selectedPermissions = array_filter($this->selectedPermissions, fn($id) => !in_array($id, $groupPermissions));
            } else {
                // Select all permissions in the group
                $this->selectedPermissions = array_unique(array_merge($this->selectedPermissions, $groupPermissions));
            }
        } else {
            // Toggle an individual permission
            if (in_array($permission, $this->selectedPermissions)) {
                // Remove the permission if already selected
                $this->selectedPermissions = array_filter($this->selectedPermissions, fn($item) => $item !== $permission);
            } else {
                // Add the permission if not already selected
                $this->selectedPermissions[] = $permission;
            }
        }

        // Debugging the selected permissions
    }

    private function areAllPermissionsSelected(): bool
    {
        $allPermissions = collect($this->permissions)
            ->flatMap(fn($groupPermissions) => $groupPermissions->pluck('id'))
            ->toArray();
        return count(array_diff($allPermissions, $this->selectedPermissions)) === 0;
    }

    private function areGroupPermissionsSelected(array $groupPermissions): bool
    {
        return count(array_diff($groupPermissions, $this->selectedPermissions)) === 0;
    }

    public function render()
    {
        return view('livewire.backend.role.role-form');
    }
}
