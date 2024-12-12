<?php

namespace App\Livewire\Backend\Role;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Role;
use Livewire\Attributes\On;

class RolesTable extends DataTableComponent
{
    protected $model = Role::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setColumnSelectDisabled();
    }

    public function columns(): array
    {
        return [
            Column::make(__('Id'), "id")
                ->sortable(),
            Column::make(__('Nama Role'), "name")
                ->sortable()
                ->searchable(),
            Column::make(__('Dibuat Pada'), "created_at")
                ->sortable(),
            Column::make(__('Diperbarui Pada'), "updated_at")
                ->sortable(),
            Column::make(__('Aksi'), 'id')
                ->view(get_admin_template_base_path() . '.pages.role.role-action'),
        ];
    }

    #[On('delete')]
    public function delete($id)
    {
        $this->dispatch('showModalDeleteConfirmation', ['id' => $id]);
    }

    #[On('deleteAction')]
    public function deleteAction($id)
    {
        $role = Role::query()->findOrFail($id);
        $role->delete();

        $this->dispatch('showToastSuccess', ['message' => __('Role berhasil dihapus')]);
        $this->dispatch('refreshDatatable');
    }
}
