<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view(get_admin_template_base_path() . '.pages.role.role-index');
    }

    public function create()
    {
        return view(get_admin_template_base_path() . '.pages.role.role-create');
    }

    public function edit(Role $role)
    {
        return view(get_admin_template_base_path() . '.pages.role.role-edit', compact('role'));
    }
}
