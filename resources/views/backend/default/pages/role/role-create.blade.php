@extends(get_admin_template_base_path() . '.layouts.app')

@section('title', __('Tambah Role'))

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title">
                        {{ __('Form Tambah Role') }}
                    </div>
                    <a href="{{ route('roles.index') }}" class="btn btn-outline-dark btn-wave">
                        <i class="bx bx-left-arrow-alt"></i>
                        {{ __('Kembali') }}
                    </a>
                </div>
                <div class="card-body">
                    <livewire:backend.role.role-form action="store" type="{{ __('Submit') }}" />
                </div>
            </div>
        </div>
    </div>
@endsection
