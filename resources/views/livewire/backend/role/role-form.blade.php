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
