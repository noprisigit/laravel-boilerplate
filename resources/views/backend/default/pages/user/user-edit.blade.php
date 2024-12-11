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
