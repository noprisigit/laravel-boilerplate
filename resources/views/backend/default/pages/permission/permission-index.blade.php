@extends(get_admin_template_base_path() . '.layouts.app')

@section('title', __('Semua Permission'))

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title">
                        {{ __('Daftar Semua Permission') }}
                    </div>
                    <button type="button" data-bs-toggle="modal" onclick="Livewire.dispatch('permission:create')" data-bs-target="#permissionModal"
                        class="btn btn-outline-primary btn-wave">
                        <i class="bx bx-plus"></i>
                        {{ __('Tambah Permission') }}
                    </button>
                </div>
                <div class="card-body">
                    <livewire:backend.permission.permissions-table theme="bootstrap-5" />

                    <livewire:backend.permission.permission-form />
                </div>
            </div>
        </div>
    </div>
@endsection
