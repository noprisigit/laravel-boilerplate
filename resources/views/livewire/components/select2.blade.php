<div
    x-data="{
        initSelect2() {
            const select = $('#{{ $elementId }}');
            select.select2({
                placeholder: @json($placeholder),
                allowClear: true
            });

            console.log(select);

            // Listen to select2 change and update Livewire state
            select.on('change', () => {
                {{-- @this.set('selectedValues', select.val()); --}}
            });

            // Watch Livewire data and update select2 when state changes
            $watch('selectedValues', (value) => {
                select.val(value).trigger('change');
            });
        }
    }"
    x-init="initSelect2()"
    wire:ignore
>
    <select id="{{ $elementId }}" class="form-control" {{ $multiple ? 'multiple' : '' }}>
        @foreach ($options as $value => $label)
            <option value="{{ $value }}" {{ in_array($value, (array) $selectedValues) ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>
</div>
