<div>
    <div wire:ignore.self class="modal fade" id="permissionModal" tabindex="-1" aria-labelledby="permissionModal"
        data-bs-keyboard="false" aria-hidden="true">
        <!-- Scrollable modal -->
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="staticBackdropLabel2">
                        {{ $modal['title'] }}
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit="{{ $action }}">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="form.group_name" class="form-label">{{ __('Grup Permission') }}</label>
                            <input type="text" class="form-control @error('form.group_name') is-invalid @enderror"
                                id="form.group_name" wire:model="form.group_name" placeholder="{{ __('Nama Grup Permission') }}">
                            @error('form.group_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="form.name" class="form-label">{{ __('Nama Permission') }}</label>
                            <input type="text" class="form-control @error('form.name') is-invalid @enderror"
                                id="form.name" wire:model="form.name" placeholder="{{ __('Nama Permission') }}">
                            @error('form.name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light btn-wave" data-bs-dismiss="modal">
                            <i class="bx bx-x"></i>
                            {{ __('Batal') }}
                        </button>
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
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
