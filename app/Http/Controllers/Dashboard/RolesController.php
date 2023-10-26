<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Role\CreateRequest;
use App\Http\Requests\Dashboard\Role\UpdateRequest;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin', 'role:super_admin']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')
            ->paginate(10);
        return view('dashboard.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = require database_path('initial_data/permissions.php');
        return view('dashboard.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $validate = $request->validated();
        $permissions = $request->permissions;
        $role = Role::create(['name' => $validate['name']]);
        $role->syncPermissions($permissions);
        return redirect()->route('dashboard.roles.index')
            ->with('success', 'Role created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('dashboard.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = require database_path('initial_data/permissions.php');
        return view('dashboard.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Role $role)
    {
        $validate = $request->validated();
        $permissions = $request->permissions;
        $role->update(['name' => $validate['name']]);
        $role->syncPermissions($permissions);
        return redirect()->route('dashboard.roles.index')
            ->with('success', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return back()
            ->with('success', 'Role deleted successfully');
    }
}
