<div class="d-flex align-items-center justify-content-between">
    <div class="d-flex gap-3">
        <button type="button" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            {{ __('Aksi') }}
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li>
                <a class="dropdown-item" href="{{ route('roles.edit', $row->id) }}">
                    {{ __('Edit') }}
                </a>
            </li>
            <li>
                <a class="modal-effect dropdown-item" href="#modalDeleteConfirmation" data-bs-effect="effect-sign"
                    data-bs-toggle="modal" wire:click="$dispatch('delete', { id: '{{ $row->id }}' })">
                    {{ __('Hapus') }}
                </a>
            </li>
        </ul>
    </div>
</div>
