<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Feature;
use App\Models\Permission;
use App\Models\Role_Permission;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RoleController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Role::class);

        $roles = Role::when(request()->has('keyword'), function ($query) {
            $keyword = request()->keyword;
            $query->where('name', 'like', '%' . $keyword . '%');
        })->with('permissions')
            ->paginate(5)->withQueryString();
        return view('Roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Role::class);

        return view('Roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $this->authorize('create', Role::class);

        $request->validate([
            // 'role_id' => 'required|exists:roles,id',
            'role' => 'required',
            'permissions' => 'array'
        ]);

        $role = new Role();
        $role->name = $request->role;
        $role->save();

        if ($request->has('permissions')) {
            $role->permissions()->attach($request->permissions);
        }

        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role, $id)
    {
        $this->authorize('update', $role);

        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        // Pass the role and permissions data to the view
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role, $id)
    {

        $this->authorize('update', $role);

        $validatedData = $request->validate([
            'role' => 'required|string|max:255',
            'permissions' => 'array', // Ensure permissions is an array
        ]);

        // Find the role by ID
        $role = Role::findOrFail($id);

        // Update role name
        $role->name = $validatedData['role'];

        // Sync permissions for the role
        if ($request->has('permissions')) {
            $role->permissions()->sync($request->permissions);
        } else {
            
            $role->permissions()->detach();
        }

       
        $role->save();

        
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role, $id)
    {
        $this->authorize('delete', $role);
        
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->back()->with('info', 'role has been deleted');
    }
}
