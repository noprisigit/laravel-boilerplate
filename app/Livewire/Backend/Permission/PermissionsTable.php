<?php

namespace App\Livewire\Backend\Permission;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Permission;
use Livewire\Attributes\On;

class PermissionsTable extends DataTableComponent
{
    protected $model = Permission::class;

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
            Column::make(__('Grup Permission'), 'group_name')
                ->sortable()
                ->searchable(),
            Column::make(__('Nama Permission'), 'name')
                ->sortable()
                ->searchable(),
            Column::make(__('Dibuat Pada'), "created_at")
                ->sortable(),
            Column::make(__('Diperbarui Pada'), "updated_at")
                ->sortable(),
            Column::make(__('Aksi'), 'id')
                ->view(get_admin_template_base_path() . '.pages.permission.permission-action'),
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
        $permission = Permission::query()->findOrFail($id);
        $permission->delete();

        $this->dispatch('showToastSuccess', ['message' => __('Permission berhasil dihapus')]);
        $this->dispatch('refreshDatatable');
    }
}
