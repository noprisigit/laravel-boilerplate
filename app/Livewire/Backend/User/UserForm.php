<?php

namespace App\Livewire\Backend\User;

use App\Models\User;
use Livewire\Component;

class UserForm extends Component
{
    public ?User $user;
    public $action;
    public $type;
    public $form = [];

    public function mount($user = null, $type = '', $action = '')
    {
        $this->action = $action ?? 'store';
        $this->type = $type ?? 'Submit';

        if ($user) {
            $this->user = $user;
            $this->initForm($user);
        }
    }

    public function initForm($user = null)
    {
        $this->form['id'] = $user && $user->id ? $user->id : '';
        $this->form['name'] = $user && $user->name ? $user->name : '';
        $this->form['email'] = $user && $user->email ? $user->email : '';
        $this->form['password'] = '';
        $this->form['password_confirmation'] = '';
    }

    public function store()
    {
        $this->validate([
            'form.name' => ['required', 'string', 'max:255'],
            'form.email' => ['required', 'string', 'email', 'unique:users,email'],
            'form.password' => ['required', 'string', 'min:8'],
            'form.password_confirmation' => ['required', 'string', 'same:form.password']
        ], [], [
            'form.name' => __('Nama Lengkap'),
            'form.email' => __('Email'),
            'form.password' => __('Kata Sandi'),
            'form.password_confirmation' => __('Konfirmasi Kata Sandi')
        ]);

        $this->form['password'] = bcrypt($this->form['password']);
        unset($this->form['password_confirmation']);

        User::query()->create($this->form);

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

        $this->user->update($this->form);

        session()->flash('success', __('Pengguna baru berhasil diperbarui'));

        $this->redirect(route('users.index'));
    }

    public function render()
    {
        return view('livewire.backend.user.user-form');
    }
}
