<?php

namespace App\Livewire\Backend\User;

use App\Models\Role;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class UserForm extends Component
{
    public ?User $user;
    public $action;
    public $type;
    public $form = [];

    public $roles = [];

    public function mount($user = null, $type = '', $action = '')
    {
        $this->action = $action ?? 'store';
        $this->type = $type ?? 'Submit';

        if ($user) {
            $this->user = $user;
            $this->initForm($user);
        }

        $this->roles = Role::query()->get()->pluck('name', 'name')->toArray();
    }

    public function initForm($user = null)
    {
        $this->form['id'] = $user && $user->id ? $user->id : '';
        $this->form['name'] = $user && $user->name ? $user->name : '';
        $this->form['email'] = $user && $user->email ? $user->email : '';
        $this->form['password'] = '';
        $this->form['password_confirmation'] = '';
        $this->form['roles'] = $user ? $user->roles->pluck('name')->toArray() : [];
    }

    public function store()
    {
        $this->validate([
            'form.name' => ['required', 'string', 'max:255'],
            'form.email' => ['required', 'string', 'email', 'unique:users,email'],
            'form.password' => ['required', 'string', 'min:8'],
            'form.password_confirmation' => ['required', 'string', 'same:form.password'],
            'form.roles' => ['required', 'array', 'min:1', 'exists:roles,name'],
        ], [
            'form.roles.*.exists' => __('Roles tidak ada')
        ], [
            'form.name' => __('Nama Lengkap'),
            'form.email' => __('Email'),
            'form.password' => __('Kata Sandi'),
            'form.password_confirmation' => __('Konfirmasi Kata Sandi'),
            'form.roles' => __('Role')
        ]);

        $roles = $this->form['roles'];

        $this->form['password'] = bcrypt($this->form['password']);
        unset($this->form['password_confirmation']);
        unset($this->form['roles']);

        $this->form['roles_name'] = $roles;
        $user = User::query()->create($this->form);
        $user->assignRole($roles);

        session()->flash('success', __('Pengguna baru berhasil ditambahkan'));

        $this->redirect(route('users.index'));
    }

    public function update()
    {
        $this->validate([
            'form.name' => ['required', 'string', 'max:255'],
            'form.email' => ['required', 'string', 'email', 'unique:users,email,' . $this->form['id']],
            'form.password' => ['nullable', 'string', 'min:8'],
            'form.password_confirmation' => ['nullable', 'string', 'same:form.password']
        ], [], [
            'form.name' => __('Nama Lengkap'),
            'form.email' => __('Email'),
            'form.password' => __('Kata Sandi'),
            'form.password_confirmation' => __('Konfirmasi Kata Sandi')
        ]);

        if (!empty($this->form['password'])) {
            $this->form['password'] = bcrypt($this->form['password']);
        }

        $this->form['roles_name'] = $this->form['roles'];
        $this->user->update($this->form);
        $this->user->syncRoles($this->form['roles']);

        session()->flash('success', __('Pengguna berhasil diperbarui'));

        $this->redirect(route('users.index'));
    }

    #[On('user:roles')]
    public function setUserRoles($roles)
    {
        $this->form['roles'] = $roles;
    }

    public function render()
    {
        return view('livewire.backend.user.user-form');
    }
}
