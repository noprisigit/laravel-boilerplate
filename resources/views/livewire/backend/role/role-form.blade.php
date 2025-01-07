<div>
    <form wire:submit="{{ $action }}">
        <div class="row mb-3">
            <label for="form.name" class="col-sm-2 col-form-label">{{ __('Nama Role') }}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('form.name') is-invalid @enderror" id="form.name"
                    wire:model="form.name" placeholder="{{ __('Nama Role') }}">
                @error('form.name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="form.permissions" class="col-sm-2 col-form-label">{{ __('Permissions') }}</label>
            <div class="col-sm-10">
                <div>
                    <div class="custom-toggle-switch d-flex align-items-center mb-4">
                        <input id="check-all-global" type="checkbox" wire:change="setSelectedPermission('all-permissions')">
                        <label for="check-all-global" class="label-info"></label><span
                            class="ms-3">{{ __('Centang Semua Permission') }}</span>
                    </div>

                    <hr>
                </div>
                <div class="row" wire:ignore>
                    @foreach ($permissions as $groupName => $groupPermissions)
                        <div class="col-4">
                            <p>{{ __($groupName) }}</p>
                            <div class="custom-toggle-switch d-flex align-items-center mb-4">
                                <input type="checkbox" class="check-all-permissions" id="check-all-{{ $groupName }}"
                                    data-group="{{ $groupName }}" wire:change="setSelectedPermission('group', '{{ $groupName }}')">
                                <label for="check-all-{{ $groupName }}" class="label-info"></label><span
                                    class="ms-3">
                                    {{ __('Centang Semua ' . $groupName) }}
                                </span>
                            </div>

                            @foreach ($groupPermissions as $permission)
                                <div class="custom-toggle-switch d-flex align-items-center mb-4">
                                    <input type="checkbox" id="check-{{ $permission->name }}" class="permission"
                                        value="{{ $permission->id }}" data-group="{{ $groupName }}" wire:model="selectedPermissions"
                                        @if (in_array($permission->id, $selectedPermissions)) checked @endif
                                        wire:change="setSelectedPermission('{{ $permission->id }}')">
                                    <label for="check-{{ $permission->name }}" class="label-info"></label><span
                                        class="ms-3">
                                        {{ __($permission->name) }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                @error('form.permissions')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary btn-wave" wire:target="{{ $action ?? '' }}"
                    wire:loading.attr="disabled">
                    <span wire:target="{{ $action }}" wire:loading>
                        <span class="spinner-border spinner-border-sm align-middle" role="status"
                            aria-hidden="true"></span>
                        Loading...
                    </span>
                    <span wire:target="{{ $action }}" wire:loading.remove>
                        <i class="bx bx-save"></i>
                        {{ $type }}
                    </span>
                </button>
                <a href="{{ route('roles.index') }}" class="btn btn-outline-dark btn-wave">
                    <i class="bx bx-x"></i>
                    {{ __('Batal') }}
                </a>
            </div>
        </div>
    </form>
</div>

@script
    <script>
        $(document).ready(function() {
            $(document).on('change', '#check-all-global', function() {
                let isChecked = $(this).is(':checked');

                $('.check-all-permissions, .permission').prop('checked', isChecked).trigger('change');
            });

            $(document).on('change', '.check-all-permissions', function() {
                const group = $(this).data('group');
                const isChecked = $(this).is(':checked');

                $(`.permission[data-group="${group}"]`).prop('checked', isChecked).trigger('change');

                updateGlobalCheckAllState();
            });

            $(document).on('change', '.permission', function() {
                const group = $(this).data('group');
                const allChecked = $(`.permission[data-group="${group}"]`).length ===
                    $(`.permission[data-group="${group}"]:checked`).length;

                $(`.check-all-permissions[data-group="${group}"]`).prop('checked', allChecked);

                updateGlobalCheckAllState();
            });
        });

        function updateGlobalCheckAllState() {
            let allChecked = $('.permission').length === $('.permission:checked').length;
            $('#check-all-global').prop('checked', allChecked);
        }
    </script>
@endscript
