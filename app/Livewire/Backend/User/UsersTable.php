<?php

namespace App\Livewire\Backend\User;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;

class UsersTable extends DataTableComponent
{
    protected $id;
    protected $model = User::class;

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
            Column::make(__('Nama Lengkap'), "name")
                ->sortable()
                ->searchable(),
            Column::make(__('Email'), "email")
                ->sortable()
                ->searchable(),
            Column::make('Roles', 'roles_name')
                ->sortable()
                ->searchable()
                ->format(function ($value, $row, Column $column) {
                    $html = '';

                    collect($row->roles_name)->map(function ($role) use (&$html) {
                        $html .= '<span class="badge bg-outline-primary">' . $role . '</span> ';
                    });

                    return $html;
                })
                ->html(),
            Column::make(__('Dibuat Pada'), "created_at")
                ->sortable(),
            Column::make(__('Diperbarui Pada'), "updated_at")
                ->sortable(),
            Column::make(__('Aksi'), 'id')
                ->view(get_admin_template_base_path() . '.pages.user.user-action'),
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
        $user = User::query()->findOrFail($id);
        $user->delete();

        $this->dispatch('showToastSuccess', ['message' => __('Pengguna berhasil dihapus')]);
        $this->dispatch('refreshDatatable');
    }
}
