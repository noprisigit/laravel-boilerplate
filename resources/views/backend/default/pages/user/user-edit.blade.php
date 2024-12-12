@extends(get_admin_template_base_path() . '.layouts.app')

@section('title', __('Edit Pengguna - ' . $user->id . ' | ' . $user->name))

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title">
                        {{ __('Form Edit Pengguna') }}
                    </div>
                    <a href="{{ route('users.index') }}" class="btn btn-outline-dark btn-wave">
                        <i class="bx bx-left-arrow-alt"></i>
                        {{ __('Kembali') }}
                    </a>
                </div>
                <div class="card-body">
                    <livewire:backend.user.user-form type="{{ __('Perbarui') }}" action="update" :user="$user" />
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: '{{ __('Pilih Role') }}'
            });

            $(document).on('change', '.roles', function() {
                const values = $(this).val();
                Livewire.dispatch('user:roles', {
                    roles: values
                });
            });
        })
    </script>
@endpush
