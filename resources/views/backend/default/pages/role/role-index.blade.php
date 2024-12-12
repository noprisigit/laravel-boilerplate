@extends(get_admin_template_base_path() . '.layouts.app')

@section('title', __('Semua Role'))

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title">
                        {{ __('Daftar Semua Role') }}
                    </div>
                    <a href="{{ route('roles.create') }}" class="btn btn-outline-primary btn-wave">
                        <i class="bx bx-plus"></i>
                        {{ __('Tambah Role') }}
                    </a>
                </div>
                <div class="card-body">
                    <livewire:backend.role.roles-table theme="bootstrap-5" />
                </div>
            </div>
        </div>
    </div>
@endsection
